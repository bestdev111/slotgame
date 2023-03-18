/**
 * @author Piotr Salaciak 2011-03-24
 * @version 1.0
 */

/**
 * Enumeration: DefaultCharacterSets
 */
Counter.DefaultCharacterSets = {
    numericUp: '0123456789',
    numericDown: '9876543210',
    alphabeticUp: ' ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    alphabeticDown: 'ZYXWVUTSRQPONMLKJIHGFEDCBA ',
    alphanumericUp: '0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    alphanumericDown: '9876543210ZYXWVUTSRQPONMLKJIHGFEDCBA ',

    calculator: '0123456789.,+-*/= ',
    qwertyKeybord: ' QWERTYUIOPASDFGHJKLZXCVBNM1234567890-=[]\\;\',./~`!@#$%^&*()_+{}|:"<>?',
    allCharacters: ' ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=[]\\;\',./~`!@#$%^&*()_+{}|:"<>?'
};

/**
 * Enumeration: ScrollDirection
 */
Counter.ScrollDirection = {
    Downwards: -1,
    Mixed: 0,
    Upwards: 1
};

/**
 * Creates an instance object of a Counter class
 * @param elementId string HTML Element's id for counter wrapper
 * @param config Object Configuration object for counter
 * @returns {Counter}
 */
function Counter(elementId, config) {
    this.wrapper = document.getElementById(elementId);
    this.wrapperId = elementId;

    this.intervalTimerId = null;
    this.timeoutTimerId = null;

    this.isAnimating = false;
    this.animationStep = 0.0;
    this.animationProgress = 0.0;
    this.beforeAnimation = [];
    this.afterAnimation = [];


    this.digitsNumber = (config.digitsNumber || 6);
    this.direction = (config.direction || Counter.ScrollDirection.Mixed);
    this.value = (config.value || "");

    this.characterSet = (config.characterSet || Counter.DefaultCharacterSets.allCharacters);
    this.characterNumber = this.characterSet.length;
    this.animationDuration = (config.animationDuration || 50);

    var tempClassNames = ["wrapper", "left", "inner", "right", "marker"];

    this.extraClassName = {};
    for (var i = 0; i < tempClassNames.length; i++) {
        if (!config.extraClassName) {
            this.extraClassName[tempClassNames[i]] = "";
        } else if (typeof config.extraClassName == "string") {
            this.extraClassName[tempClassNames[i]] = config.extraClassName;
        } else {
            this.extraClassName[tempClassNames[i]] = (config.extraClassName[tempClassNames[i]] || "");
        }
    }

    this.onLoad = (config.onLoad || null);
    this.onValueChanged = (config.onValueChanged || null);

    var that = this;
    this.imageLoadCounter = 0;

    this.charsImage = new Image();
    this.charsImage.onload = function() {
        that.finishLoading();
    };
    this.charsImage.src = config.charsImageUrl;

    this.markerImage = new Image();
    this.markerImage.onload = function() {
        that.finishLoading();
    };
    this.markerImage.src = config.markerImageUrl;

    this.point = config.point;
}

/**
 * Loads the counter only when whole page is loaded and both images of digits/characters and marker.
 */
Counter.prototype.finishLoading = function() {
    this.imageLoadCounter++;

    if (this.imageLoadCounter != 2 || !this.charsImage.width || !this.markerImage.width)
        return;

    this.digitWidth = this.charsImage.width;
    this.digitHeight = Math.ceil(this.charsImage.height / this.characterNumber);

    this.offsetHeight = (this.markerImage.height - this.digitHeight) / 2;

    this.makrer = document.createElement("DIV");
    this.makrer.className = "counter_marker" + (this.extraClassName.marker ? " " : "") + this.extraClassName.marker;
    this.makrer.style.backgroundImage = "url('" + this.markerImage.src + "')";
    this.makrer.style.width = (this.digitWidth * this.digitsNumber + this.digitsNumber) + "px";
    this.makrer.style.height = this.markerImage.height + "px";

    this.wrapper.className = this.wrapper.className + (this.extraClassName.marker ? " " : "") + this.extraClassName.marker;
    this.wrapper.style.width = this.makrer.style.width;
    this.wrapper.style.height = this.makrer.style.height;

    this.wrapper.appendChild(this.makrer);


    var i = 0;
    total_width = 0;
    for (i = 0; i < this.digitsNumber; i++) {
        var temp = document.createElement("DIV");
        temp.id = this.wrapperId + "_" + i;
        temp.className = "counter_character";
        if (i == 0)
            temp.className += " counter_character_left" + (this.extraClassName.left ? " " : "") + this.extraClassName.left;
        else if (i == this.digitsNumber - 1)
            temp.className += " counter_character_right" + (this.extraClassName.right ? " " : "") + this.extraClassName.right;
        else
            temp.className += " counter_character_inner" + (this.extraClassName.inner ? " " : "") + this.extraClassName.inner;

        temp.style.backgroundImage = "url('" + this.charsImage.src + "')";
        temp.style.width = this.digitWidth + "px";
        temp.style.height = this.markerImage.height + "px";
        temp.style.top = (-this.markerImage.height) + "px";
        this.wrapper.appendChild(temp);


        /* ### START: Special: Tsder Punkt eingebaut ### */

        if ((i == 0 && this.digitsNumber == 4) ||  (i == 1 && this.digitsNumber == 5) ||  (i == 2 && this.digitsNumber == 6) ||  ((i == 3 || i == 0) && this.digitsNumber == 7)) {
            var div_point = document.createElement("div");
            div_point.className = "counter_character";
            div_point.setAttribute('style', 'top: -32px;');
            this.wrapper.appendChild(div_point);

            var point = document.createElement("img");
            point.setAttribute('src', this.point);
            point.setAttribute('width', '5');
            point.setAttribute('height', '31');
            point.setAttribute('style', 'border: 0; margin: 1px;');
            this.wrapper.appendChild(div_point).appendChild(point);
        }

        /* ### END: Special ### */


        total_width += Counter._parseInt(Counter._elementCurrentStyle(temp, "margin-left"));
        total_width += Counter._parseInt(Counter._elementCurrentStyle(temp, "margin-right"));
        total_width += Counter._parseInt(Counter._elementCurrentStyle(temp, "border-left-width"));
        total_width += Counter._parseInt(Counter._elementCurrentStyle(temp, "border-right-width"));
        total_width += this.digitWidth;
    }

    this.makrer.style.width = total_width + "px";
    this.wrapper.style.width = (total_width + 40) + "px";

    if (this.onLoad != null)
        this.onLoad();

    //this.setValue(this.value, 1500);
    this.setValue(this.value, 1);
};


Counter.prototype.animate = function(forceFinish) {

    if (forceFinish) {
        this.animationProgress = 1.0;
    } else {
        this.animationProgress += this.animationStep;
    }

    if (this.animationProgress >= 1) {
        this.animationProgress = 1.0;
        if (this.timeoutTimerId)
            clearTimeout(this.timeoutTimerId);
        if (this.intervalTimerId)
            clearTimeout(this.intervalTimerId);

        this.isAnimating = false;
        this.timeoutTimerId = null;
        this.intervalTimerId = null;
    }

    var i = 0;
    var idPrefix = this.wrapper.id + "_";

    for (i = 0; i < this.beforeAnimation.length; i++) {
        var temp = document.getElementById(idPrefix + (this.digitsNumber - i - 1));
        if (temp) {
            var progress = 0.0;
            if (this.animationProgress < 1)
                progress = this.beforeAnimation[i] + (this.afterAnimation[i] - this.beforeAnimation[i]) * this.animationProgress;
            else {
                progress = this.afterAnimation[i];
            }
            var test = this;
            temp.style.backgroundPosition = "0px " + Counter._parseInt(progress) + "px";
        }
    }
};

/**
 * Sets new value for the counter object
 * @param newValue string
 * @param duration integer Number of miliseconds that designates the animation duration
 */
Counter.prototype.setValue = function(newValue, duration) {
    if (this.imageLoadCounter != 2 || !this.charsImage.width || !this.markerImage.width) {
        this.value = newValue;
        if (this.onValueChanged != null)
            this.onValueChanged();
        return;
    }

    if (this.timeoutTimerId)
        clearTimeout(this.timeoutTimerId);
    if (this.intervalTimerId)
        clearTimeout(this.intervalTimerId);

    var i = 0;
    var idPrefix = this.wrapper.id + "_";
    var beforeInx = [];

    this.beforeAnimation = [];
    this.afterAnimation = [];

    for (i = this.digitsNumber - 1; i >= 0; i--) {
        var temp = document.getElementById(idPrefix + (this.digitsNumber - i - 1));
        this.beforeAnimation[i] = new Number(temp.style.backgroundPosition.substr(4).replace("px", ""));
    }

    var strCurrentValue = (this.value.toString ? this.value.toString() : new String(this.value));
    var strNextValue = (newValue.toString ? newValue.toString() : new String(newValue));

    for (i = this.digitsNumber - 1; i >= 0; i--) {
        var temp = document.getElementById(idPrefix + (this.digitsNumber - i - 1));

        var current = -1;
        if (strCurrentValue.length - i - 1 >= 0) {
            var strCurrentChar = strCurrentValue.charAt(strCurrentValue.length - i - 1).toUpperCase();
            current = this.characterSet.indexOf(strCurrentChar);
        }

        if (current == -1) current = this.characterSet.indexOf(" ");
        if (current == -1) current = this.characterSet.indexOf("0");
        if (current == -1) current = 0;

        var next = -1;
        if (strNextValue.length - i - 1 >= 0) {
            var strNextChar = strNextValue.charAt(strNextValue.length - i - 1).toUpperCase();
            next = this.characterSet.indexOf(strNextChar);
        }
        if (next == -1) next = this.characterSet.indexOf(" ");
        if (next == -1) next = this.characterSet.indexOf("0");
        if (next == -1) next = 0;

        var test = this;
        this.afterAnimation[i] = Math.round((-this.digitHeight * next + this.offsetHeight));


        if (this.direction == 0) {
            if (Math.abs(current - next) > this.characterNumber / 2) {
                if (next < current)
                    this.beforeAnimation[i] = this.beforeAnimation[i] + this.digitHeight * this.characterNumber;
                else
                    this.beforeAnimation[i] = this.beforeAnimation[i] - this.digitHeight * this.characterNumber;
            }
        } else if (this.direction == -1) {
            if (this.beforeAnimation[i] > this.afterAnimation[i])
                this.beforeAnimation[i] = this.beforeAnimation[i] - this.digitHeight * this.characterNumber;
        } else if (this.direction == 1) {
            if (this.beforeAnimation[i] < this.afterAnimation[i])
                this.beforeAnimation[i] = this.beforeAnimation[i] + this.digitHeight * this.characterNumber;

        }

    }

    this.value = newValue;

    if (this.onValueChanged != null)
        this.onValueChanged();

    if (!(duration && parseInt(duration) > 0))
        duration = 1000;

    this.isAnimating = true;

    var stepDuration = this.animationDuration;

    this.animationStep = (stepDuration / duration);
    this.animationProgress = 0.0;

    var that = this;
    if (duration > stepDuration)
        this.intervalTimerId = setInterval(function() {
            that.animate(false);
        }, stepDuration);

    this.timeoutTimerId = setTimeout(function() {
        that.animate(true);
    }, duration);

};

//--- some useful methods ---
Counter._parseInt = function(val) {
    var ret = parseInt(val);
    if (isNaN(ret))
        ret = 0;
    return ret;
};
Counter._elementCurrentStyle = function(element, styleName) {
    if (element.currentStyle) {
        var i = 0,
            temp = "",
            changeCase = false;
        for (i = 0; i < styleName.length; i++) {
            if (styleName.charAt(i) && (styleName.charAt(i) != '-' || styleName.charAt(i).toString() != '-')) {
                if (styleName.charAt(i).toString) {
                    temp = temp + (changeCase ? styleName.charAt(i).toString().toUpperCase() : styleName.charAt(i).toString());
                } else {
                    temp = temp + (changeCase ? styleName.charAt(i).toUpperCase() : styleName.charAt(i));
                }
                changeCase = false;
            } else {
                changeCase = true;
            }
        }

        styleName = temp;
        return element.currentStyle[styleName];
    } else {
        return getComputedStyle(element, null).getPropertyValue(styleName);
    }
};