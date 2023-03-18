function i18n(key) {
    var value = i18n.data[key];
    if (!value) {
        value = "?" + key + "?";
    }
    return value;
}
i18n.init = function(data) {
    i18n.data = data;
};