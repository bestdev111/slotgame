var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Roulette = function (_React$Component) {
  _inherits(Roulette, _React$Component);

  function Roulette(props) {
    var _this$state;

    _classCallCheck(this, Roulette);

    var _this = _possibleConstructorReturn(this, (Roulette.__proto__ || Object.getPrototypeOf(Roulette)).call(this, props));

    _this.state = (_this$state = {
      run_id: 0,
      status: 'LOADING',
      history: false,
      remaining: 0,
      next_call: 0,
      lastResult: 0
    }, _defineProperty(_this$state, 'history', false), _defineProperty(_this$state, 'resultUpdated', false), _defineProperty(_this$state, 'hs', false), _defineProperty(_this$state, 'stateChanging', false), _defineProperty(_this$state, 'coupon', false), _defineProperty(_this$state, 'token', 1), _defineProperty(_this$state, 'playing', false), _defineProperty(_this$state, 'auto', true), _defineProperty(_this$state, 'limit', 0), _defineProperty(_this$state, 'kalan', 0), _this$state);
    _this.black = [2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24, 26, 28, 29, 31, 33, 35];
    _this.numMouseMove = _this.numMouseMove.bind(_this);
    _this.resetHs = _this.resetHs.bind(_this);
    _this.neighbourPx = 5; // komşuluk piksel sayısı
    _this.betTitles = rouletteOptions.games;
    _this.tokens = rouletteOptions.tokens;
    _this.development = devmode;
    _this.autoAccepted = false;
    return _this;
  }

  _createClass(Roulette, [{
    key: 'componentDidMount',
    value: function componentDidMount() {
      var _this2 = this;

      this.playVideo();
      this.fetchData();
      setInterval(function () {
        return _this2.sureTick();
      }, 1000);
    }
  }, {
    key: 'sureTick',
    value: function sureTick() {

      if (this.development) return false;

      if (this.state.remaining > 0) {

        if (this.state.remaining - 1 == 0) {
          if (this.autoAccepted == false && this.state.auto == true && this.state.coupon) {
            this.autoAccepted = true;
            this.play(true);
          }
        }

        this.setState(function (state) {
          return {
            remaining: state.remaining - 1
          };
        });
      }
      if (this.state.next_call > 0) {
        this.setState(function (state) {
          return {
            next_call: state.next_call - 1
          };
        });
      }
    }
  }, {
    key: 'fetchData',
    value: function fetchData() {
      var _this3 = this;

      fetch('/yeniajax/ruletjson.php?cmd=RuletBilgisi').then(function (res) {
        return res.json();
      }).then(function (result) {
        var _this3$setState;

        var data = result.data;
        data.lastResult = parseInt(data.lastResult);

        if (_this3.state.lastResult != data.lastResult && _this3.state.status != 'LOADING') {
          setTimeout(function () {
            return _this3.setState({ resultUpdated: true });
          }, 3000);
          setTimeout(function () {
            return _this3.setState({ resultUpdated: false });
          }, 8000);
        }

        // kuponu hemen güncelle
        _this3.setState({
          coupon: result.coupon
        });

        if (_this3.development) data.remaining_time = 10;

        _this3.setState((_this3$setState = {
          run_id: data.run_id,
          status: data.status,
          history: data.resultHistory,
          remaining: parseInt(data.remaining_time),
          next_call: parseInt(data.next_call),
          lastResult: data.lastResult
        }, _defineProperty(_this3$setState, 'history', data.resultHistory), _defineProperty(_this3$setState, 'limit', parseFloat(result.limit)), _defineProperty(_this3$setState, 'kalan', parseFloat(result.kalan)), _this3$setState));

        if (parseInt(data.remaining_time) < 1) {
          setTimeout(function () {
            return _this3.fetchData();
          }, 3000);
        } else {
          setTimeout(function () {
            return _this3.fetchData();
          }, parseInt(data.remaining_time) * 1000);
          _this3.autoAccepted = false;
        }
      });
    }
  }, {
    key: 'repeatBets',
    value: function repeatBets(id) {
      var _this4 = this;

      fetch('/yeniajax/ruletjson.php?cmd=KuponTekrarla&id=' + id).then(function (res) {
        return res.json();
      }).then(function (result) {
        _this4.setState({
          coupon: result.coupon,
          couponApplied: false
        });
      });
    }
  }, {
    key: 'playVideo',
    value: function playVideo() {

      var klasConfig = {
        source: {
          entries: [{
            bintu: {
              apiurl: "https://bintu.nanocosmos.de",
              streamid: "7a9697eb-2c99-4ef3-9d02-3f33840940a0"
            }
          }]
        },
        playback: {
          autoplay: true,
          automute: false,
          muted: false,
          flashplayer: "//demo.nanocosmos.de/nanoplayer/nano.player.swf"
        },
        style: {
          displayMutedAutoplay: true,
          controls: false
        }
      };

      klasPlayer = new NanoPlayer('playerDiv');
      klasPlayer.setup(klasConfig).then(function (klasConfig) {
        console.log('setup ok with config: ' + JSON.stringify(klasConfig));
      }, function (error) {
        console.log(error);
      });
    }
  }, {
    key: 'numMouseMove',
    value: function numMouseMove(event, num) {
      var _this5 = this;

      var hs = [num];

      if (event == 'split-4') {
        hs.push(num + 1);
        hs.push(num + 3);
        hs.push(num + 4);
      } else if (event == 'split-2') {
        hs.push(num + 1);
      } else if (event == 'split-2-y') {
        hs.push(num + 3);
      }

      this.setState({
        hs: hs
        //stateChanging: false
      });
      setTimeout(function () {
        _this5.state.stateChanging = false;
      }, 100);
    }

    // kuponu temizle

  }, {
    key: 'clearCoupon',
    value: function clearCoupon() {
      var _this6 = this;

      var formData = new FormData();
      formData.append('do', 'empty');
      formData.append('coupon_type', 'roulette');
      fetch('/yeniajax/ruletjson.php?cmd=KuponTemizle', {
        method: 'POST',
        body: formData
      }).then(function (res) {
        return res.json();
      }).then(function (result) {
        _this6.setState({
          coupon: result.coupon
        });
      });
    }

    // oyna

  }, {
    key: 'play',
    value: function play(auto) {
      var _this7 = this;

      if (this.state.remaining < 1 && auto !== true) return;
      if (this.state.playing) return;
      this.setState({
        playing: true
      });
      var formData = new FormData();
      formData.append('run_id', this.state.run_id);
      formData.append('coupon_type', 'roulette');
      fetch('/yeniajax/ruletjson.php?cmd=PlayBilgisi' + (auto ? '&auto=true' : ''), {
        method: 'POST',
        body: formData
      }).then(function (res) {
        return res.json();
      }).then(function (result) {
        if (result.status == 'error') {
		  if (auto !== true || result.message != 'Kuponunuz boş.') failcont('Uyarı',result.message);
          _this7.setState({
            playing: false
          });
          return false;
        }
		couponbakiye(result.balance);
        _this7.setState({
          coupon: result.coupon,
          playing: false,
          couponApplied: true,
          couponAppliedID: result.coupon.applied_id
        });
      });
    }

    // bahis çıkar

  }, {
    key: 'removeBet',
    value: function removeBet(key) {
      var _this8 = this;

      var formData = new FormData();
      formData.append('key', key);
      formData.append('type', 'roulette');
      fetch('/yeniajax/ruletjson.php?cmd=KuponSil', {
        method: 'POST',
        body: formData
      }).then(function (res) {
        return res.json();
      }).then(function (result) {
        _this8.setState({
          coupon: result.coupon
        });
      });
      return false;
    }

    // bahis yap

  }, {
    key: 'makeBet',
    value: function makeBet() {
      var _this9 = this;

      var formData = new FormData();
      if (_typeof(this.state.hs) == 'object') {
        this.state.hs.map(function (value, key) {
          formData.append('selection[]', value);
        });
      } else formData.append('selection', this.state.hs);
      formData.append('token', this.state.token);
      fetch('/yeniajax/ruletjson.php?cmd=KuponEkle', {
        method: 'POST',
        body: formData
      }).then(function (res) {
        return res.json();
      }).then(function (result) {
        if (result.status == 'error') {
          failcont('Uyarı',result.message);
          return;
        }
        _this9.setState({
          coupon: result.coupon,
          couponApplied: false

        });
        setTimeout(function () {
          coupon_position();
        }, 100);
      });
    }
  }, {
    key: 'resetHs',
    value: function resetHs() {
      this.setState({
        hs: false
        //stateChanging: false
      });
    }
  }, {
    key: 'rouletteNums',
    value: function rouletteNums(start) {
      var _this10 = this;

      var classes = '';
      return [start + 1, start + 2, start + 3].map(function (x, i) {
        classes = '';
        if (_this10.state.hs == '1st12' && start < 10) classes = 'active';else if (_this10.state.hs == '2nd12' && start >= 12 && start < 22) classes = 'active';else if (_this10.state.hs == '3rd12' && start >= 24) classes = 'active';else if (_this10.state.hs == '1to18' && x < 19) classes = 'active';else if (_this10.state.hs == '19to36' && x > 18) classes = 'active';else if (_this10.state.hs == 'odd' && Math.abs(x % 2) == 1) classes = 'active';else if (_this10.state.hs == 'even' && x % 2 == 0) classes = 'active';else if (_this10.state.hs == 'red' && _this10.black.indexOf(x) === -1) classes = 'active';else if (_this10.state.hs == 'black' && _this10.black.indexOf(x) !== -1) classes = 'active';else if (_this10.state.hs == 'line1' && i == 0) classes = 'active';else if (_this10.state.hs == 'line2' && i == 1) classes = 'active';else if (_this10.state.hs == 'line3' && i == 2) classes = 'active';else if (_typeof(_this10.state.hs) === 'object' && _this10.state.hs.indexOf(x) !== -1 && _this10.state.hs.length > 1) classes = 'active';

        var bClass = '';
        if (_typeof(_this10.state.hs) === 'object' && _this10.state.hs.indexOf(x) !== -1 && _this10.state.hs.length == 1) bClass = 'active';

        return React.createElement(
          'span',
          { key: x, className: classes },
          React.createElement(
            'b',
            { onMouseOver: function onMouseOver() {
                return _this10.numMouseMove('self', x);
              }, className: bClass + ' ' + (_this10.black.indexOf(parseInt(x)) !== -1 ? 'r-black' : 'r-red'),
              onContextMenu: function onContextMenu(e) {
                e.preventDefault();_this10.removeBet('single' + x);
              } },
            x,
            _typeof(_this10.state.coupon.bets) === 'object' && Object.keys(_this10.state.coupon.bets).indexOf('single' + x) !== -1 ? React.createElement(
              'small',
              null,
              _this10.state.coupon.bets['single' + x].stake
            ) : ''
          ),
          [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36, 35, 34].indexOf(x) === -1 ? React.createElement(
            'i',
            { className: 'split-4', onMouseOver: function onMouseOver() {
                return _this10.numMouseMove('split-4', x);
              },
              onContextMenu: function onContextMenu(e) {
                e.preventDefault();_this10.removeBet('dortlu-' + x);
              } },
            _typeof(_this10.state.coupon.bets) === 'object' && Object.keys(_this10.state.coupon.bets).indexOf('dortlu-' + x) !== -1 ? React.createElement(
              'small',
              null,
              _this10.state.coupon.bets['dortlu-' + x].stake
            ) : ''
          ) : '',
          [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36].indexOf(x) === -1 ? React.createElement(
            'i',
            { className: 'split-2', onMouseOver: function onMouseOver() {
                return _this10.numMouseMove('split-2', x);
              },
              onContextMenu: function onContextMenu(e) {
                e.preventDefault();_this10.removeBet('dikey-' + x);
              } },
            _typeof(_this10.state.coupon.bets) === 'object' && Object.keys(_this10.state.coupon.bets).indexOf('dikey-' + x) !== -1 ? React.createElement(
              'small',
              null,
              _this10.state.coupon.bets['dikey-' + x].stake
            ) : ''
          ) : '',
          [34, 35, 36].indexOf(x) === -1 ? React.createElement(
            'i',
            { className: 'split-2-y', onMouseOver: function onMouseOver() {
                return _this10.numMouseMove('split-2-y', x);
              },
              onContextMenu: function onContextMenu(e) {
                e.preventDefault();_this10.removeBet('yatay-' + x);
              } },
            _typeof(_this10.state.coupon.bets) === 'object' && Object.keys(_this10.state.coupon.bets).indexOf('yatay-' + x) !== -1 ? React.createElement(
              'small',
              null,
              _this10.state.coupon.bets['yatay-' + x].stake
            ) : ''
          ) : ''
        );
      });
    }
  }, {
    key: 'setAppliedStatus',
    value: function setAppliedStatus(newStatus) {
      this.setState({
        couponApplied: newStatus
      });
    }
  }, {
    key: 'changeAutoAccept',
    value: function changeAutoAccept() {
      this.setState(function (state) {
        return {
          auto: state.auto === true ? false : true
        };
      });
    }
  }, {
    key: 'chip',
    value: function chip(num, clickable, sinif) {
      var _this11 = this;

      return React.createElement(
        'div',
        { key: num, className: 'rulet-chip rc-' + (sinif ? sinif : this.tokens[num]) + (this.state.token == parseInt(num) || !clickable ? ' active' : ''), onClick: function onClick() {
            return clickable === true ? _this11.setState({ token: parseInt(num) }) : null;
          } },
        React.createElement(
          'svg',
          { xmlns: 'http://www.w3.org/2000/svg',
            xmlnsXlink: 'http://www.w3.org/1999/xlink',
            xmlSpace: 'preserve',
            style: { 'shapeRendering': 'geometricPrecision', 'textRendering': 'geometricPrecision', 'imageRendering': 'optimizeQuality' },
            viewBox: '0 0 8.3234 8.3234',
            x: '0px', y: '0px', fillRule: 'evenodd', clipRule: 'evenodd' },
          React.createElement(
            'g',
            null,
            React.createElement('path', { d: 'M4.432 0c0.9481,0.0607 1.8101,0.4383 2.4811,1.028l-0.5183 0.5183c-0.5367,-0.4586 -1.2163,-0.7551 -1.9628,-0.8131l0 -0.7332zm2.8634 1.4104c0.5896,0.6711 0.9673,1.5329 1.028,2.481l-0.733 0c-0.0581,-0.7465 -0.3546,-1.4261 -0.8133,-1.9627l0.5183 -0.5183zm-3.4041 -0.6772c-0.7465,0.0581 -1.426,0.3545 -1.9627,0.8131l-0.5183 -0.5183c0.6711,-0.5896 1.5329,-0.9673 2.481,-1.028l0 0.7332zm-2.345 1.1955c-0.4587,0.5367 -0.7552,1.2162 -0.8133,1.9627l-0.733 0c0.0607,-0.9481 0.4383,-1.8101 1.0279,-2.4811l0.5184 0.5184zm6.7771 2.5034c-0.0607,0.9481 -0.4382,1.8101 -1.0279,2.4811l-0.5183 -0.5183c0.4587,-0.5367 0.7551,-1.2163 0.8132,-1.9628l0.733 0zm-1.4103 2.8634c-0.671,0.5897 -1.5329,0.9674 -2.4811,1.0281l0 -0.7332c0.7466,-0.058 1.426,-0.3546 1.9628,-0.8132l0.5183 0.5183zm-3.0218 1.0281c-0.9482,-0.0607 -1.8101,-0.4383 -2.4811,-1.028l0.5183 -0.5183c0.5367,0.4587 1.2163,0.755 1.9628,0.8131l0 0.7332zm-2.8634 -1.4104c-0.5896,-0.6711 -0.9672,-1.533 -1.0279,-2.4811l0.733 0c0.058,0.7466 0.3546,1.4261 0.8132,1.9628l-0.5183 0.5183z' })
          )
        ),
        React.createElement(
          'div',
          { className: 'rulet-chip-text' },
          num
        )
      );
    }
  }, {
    key: 'couponDetail',
    value: function couponDetail() {
      var _this12 = this;

      return React.createElement(
        'div',
        null,
        _typeof(this.state.coupon.bets) !== 'object' || this.state.coupon.bets.length == 0 ? React.createElement(
          'div',
          { className: 'betting-slip-content' },
          React.createElement(
            'div',
            { className: 'coupon-empty' },
            React.createElement('i', { className: 'fal fa-file' }),
            React.createElement(
              'strong',
              null,
              'Kuponunuz bo\u015F.'
            ),
            React.createElement(
              'span',
              { className: 'text-muted' },
              'Ma\xE7 eklemek i\xE7in oranlara t\u0131klay\u0131n\u0131z.'
            )
          ),
          React.createElement(
            'div',
            { 'class': 'coupon-actions' },
            React.createElement(
              'span',
              { 'class': 'btn btn-secondary btn-block', style: { 'width': '90%' }, onClick: function onClick() {
                  return _this12.repeatBets('last');
                } },
              'Son kuponu tekrarla'
            )
          )
        ) : React.createElement(
          'div',
          null,
          React.createElement(
            'div',
            { className: 'betting-slip-content' },
            this.state.coupon.bets !== false ? Object.keys(this.state.coupon.bets).map(function (key) {
              var bet = _this12.state.coupon.bets[key];
              return React.createElement(
                'div',
                { className: 'roulette-bet', key: key },
                React.createElement(
                  'div',
                  { className: 'roulette-bet-head' },
                  React.createElement(
                    'span',
                    { className: 'bet-name' },
                    _this12.betTitles[bet.bet_type]
                  ),
                  React.createElement(
                    'span',
                    { className: 'slip-del', onClick: function onClick() {
                        return _this12.removeBet(key);
                      } },
                    React.createElement('i', { className: 'fa fa-times' })
                  )
                ),
                React.createElement(
                  'div',
                  { className: 'roulette-bet-info' },
                  React.createElement(
                    'span',
                    { className: 'bet-selection' },
                    bet.bet_type == 'single' ? React.createElement(
                      'b',
                      { key: bet.bet, className: bet.bet == 0 ? 'b-green' : _this12.black.indexOf(bet.bet) === -1 ? 'b-red' : 'b-black' },
                      bet.bet
                    ) : bet.bet.map(function (num) {
                      return React.createElement(
                        'b',
                        { key: num, className: _this12.black.indexOf(parseInt(num)) === -1 ? 'b-red' : 'b-black' },
                        num
                      );
                    })
                  ),
                  React.createElement(
                    'span',
                    { className: 'bet-odd' },
                    _this12.chip(bet.stake, false, 'default'),
                    ' ',
                    React.createElement(
                      'span',
                      null,
                      'x ',
                      bet.odd
                    )
                  )
                )
              );
            }) : '',
            React.createElement(
              'div',
              { className: 'coupon-fresh' },
              React.createElement(
                'span',
                { className: 'coupon-count' },
                'Toplam 1 bahis'
              ),
              React.createElement(
                'span',
                { className: 'btn btn-sm btn-success', onClick: function onClick() {
                    return _this12.clearCoupon();
                  } },
                'Kuponu Temizle'
              )
            ),
            React.createElement(
              'div',
              { className: 'slip-alt' },
              React.createElement(
                'ul',
                { className: 'slip-input' },
                React.createElement(
                  'li',
                  { style: { 'border-top': '1px solid #00582b' } },
                  React.createElement(
                    'span',
                    null,
                    'Seans Numarası:'
                  ),
                  React.createElement(
                    'span',
                    null,
                    this.state.remaining > 0 ? this.state.run_id : React.createElement(
                      'small',
                      { className: 'text-muted' },
                      'Bekleniyor'
                    )
                  )
                ),
                this.state.limit > 0 ? React.createElement(
                  'li',
                  null,
                  React.createElement(
                    'span',
                    null,
                    'Seans Ba\u015F\u0131na Limit:'
                  ),
                  React.createElement(
                    'span',
                    { className: 'text-muted' },
                    this.state.limit,
                    ' ',
                    balanceText
                  )
                ) : '',
                this.state.limit > 0 ? React.createElement(
                  'li',
                  null,
                  React.createElement(
                    'span',
                    null,
                    'Kalan Limitiniz:'
                  ),
                  React.createElement(
                    'span',
                    { className: this.state.kalan == 0 ? "text-danger" : "text-muted" },
                    this.state.kalan,
                    ' ',
                    balanceText
                  )
                ) : '',
                React.createElement(
                  'li',
                  null,
                  React.createElement(
                    'span',
                    null,
                    '\xD6denecek Tutar:'
                  ),
                  React.createElement(
                    'span',
                    { className: parseInt(this.state.kalan) - this.state.coupon.amount < 0 ? "text-danger" : "text-success" },
                    this.state.coupon.amount,
                    ' ',
                    balanceText
                  )
                ),
                React.createElement(
                  'li',
                  null,
                  React.createElement(
                    'span',
                    null,
                    'Otomatik Oyna:'
                  ),
                  React.createElement(
                    'span',
                    null,
                    React.createElement(
                      'label',
                      { className: 'bet-check' },
                      React.createElement('input', { type: 'checkbox', value: '1', checked: this.state.auto === true ? true : false, onClick: function onClick() {
                          return _this12.changeAutoAccept();
                        } }),
                      React.createElement('span', null),
                      React.createElement('div', { className: 'bet-check-text ' })
                    )
                  )
                )
              ),
              !this.state.auto ? this.state.remaining < 1 ? React.createElement(
                'div',
                { className: 'mbs-error' },
                'Bahisler kapand\u0131, bir sonraki seansa oynayabilirsiniz.'
              ) : React.createElement(
                'div',
                { className: 'cp-button' },
                React.createElement(
                  'button',
                  { type: 'submit', className: 'btn btn-secondary btn-block btn-lg', onClick: function onClick() {
                      return _this12.play();
                    } },
                  !this.state.playing ? 'KUPONU OYNA' : React.createElement('i', { className: 'fas fa-spinner fa-pulse' })
                )
              ) : ''
            )
          )
        )
      );
    }
  }, {
    key: 'render',
    value: function render() {
      var _this13 = this;

      var c = 0;
      var nums = [];
      for (i = 0; i <= 11; i++) {
        nums.push(i);
      }

      // tabloda hangi numaralara hangi sınıfları vereceğimizi hesaplayalım
      this.numClasses = {};
      if (_typeof(this.state.coupon) === 'object' && Object.keys(this.state.coupon).indexOf('bets') !== -1 && _typeof(this.state.coupon.bets) === 'object') {
        Object.keys(this.state.coupon.bets).map(function (key) {
          var bet = _this13.state.coupon.bets[key];
          if (key.substr(0, 5) == 'multi') {
            var classKey = key.replace('multi', '');
            if (bet.bet.length == 4) _this13.numClasses[classKey] = 'ch-4';else if (bet.bet.length == 3) _this13.numClasses[classKey] = 'ch-3';else if (bet.bet.length == 2) {
              if (parseInt(bet.bet[1]) - parseInt(bet.bet[0]) == 1) _this13.numClasses[classKey] = 'ch-2-top';else _this13.numClasses[classKey] = 'ch-2-right';
            }
          }
        });
      }

      return React.createElement(
        'div',
        { className: 'd-flex' },
        React.createElement(
          'div',
          { className: 'home-left', style: { 'width': '74%','float': 'left' } },
          React.createElement(
            'div',
            { className: 'rulet-title' },
            React.createElement(
              'span',
              null,
              'CANLI RULET'
            )
          ),
          React.createElement(
            'div',
            { className: 'rulet-video', id: 'tmb-player' },
            React.createElement('div', { id: 'playerDiv', style: { position: 'absolute', top: 0, left: 0, right: 0, bottom: 0 } }),
            React.createElement(
              'div',
              { className: 'player-controls' },
              React.createElement(
                'div',
                { className: 'controlBottom' },
                React.createElement(
                  'span',
                  null,
                  'Canl\u0131 Yay\u0131n'
                ),
                React.createElement('i', { className: 'fa fa-volume', id: 'video-vol' }),
                React.createElement('i', { className: 'fa fa-expand', id: 'video-fs' })
              )
            ),
            this.state.status != 'LOADING' ? React.createElement(
              'div',
              { className: 'rulet-lastball' },
              React.createElement(
                'strong',
                { 'class': this.state.resultUpdated ? 'animate' : '' },
                this.state.lastResult
              )
            ) : ''
          ),
          React.createElement(
            'div',
            { className: 'rulet-chips' },
            Object.keys(this.tokens).map(function (tokenNum) {
              return _this13.chip(tokenNum, true);
            })
          ),
          this.state.status == 'LOADING' ? React.createElement(Loading, null) : React.createElement(
            'div',
            { className: this.state.remaining < 1 ? 'rulet-passive' : 'rulet-active' },
            React.createElement(
              'div',
              { className: 'rulet-info' },
              React.createElement(
                'div',
                { className: 'rulet-status' + (this.state.remaining < 1 ? ' rulet-closed' : '') },
                React.createElement(
                  'div',
                  { className: 'rulet-status-text' },
                  this.state.remaining < 1 ? React.createElement(
                    'span',
                    null,
                    'Bahisler Kapal\u0131'
                  ) : React.createElement(
                    'span',
                    null,
                    React.createElement(
                      'i',
                      null,
                      'Bahisler A\xE7\u0131k'
                    ),
                    React.createElement(
                      'b',
                      null,
                      this.state.remaining
                    )
                  )
                )
              ),
              React.createElement(
                'div',
                { className: 'r-seans' },
                this.state.remaining > 0 ? React.createElement(
                  'div',
                  { className: 'r-seans-no' },
                  React.createElement(
                    'span',
                    null,
                    'SEANS NUMARASI:'
                  ),
                  ' ',
                  React.createElement(
                    'span',
                    { className: 'text-warning' },
                    this.state.run_id
                  )
                ) : React.createElement(
                  'small',
                  { className: 'text-muted textmuteds' },
                  'Seans ',
                  this.state.run_id,
                  ' sonu\xE7lan\u0131yor...'
                )
              ),
              React.createElement(
                'div',
                { className: 'r-lastresults' },
                React.createElement(
                  'div',
                  { className: 'r-lrtitle' },
                  'GE\xC7M\u0130\u015E'
                ),
                React.createElement(
                  'div',
                  { className: 'r-nums' },
                  this.state.history !== false ? this.state.history.slice(0, 10).map(function (num, key) {
                    return React.createElement(
                      'b',
                      { key: key, className: key == 0 ? 'r-green' + (_this13.state.resultUpdated ? ' r-updated' : '') : _this13.black.indexOf(parseInt(num)) !== -1 ? 'r-black' : parseInt(num) == 0 ? 'r-zero' : '' },
                      num
                    );
                  }) : ''
                )
              )
            ),
            React.createElement(
              'div',
              { className: 'rulet-table', onClick: function onClick() {
                  return _this13.makeBet();
                }, onMouseOut: this.resetHs },
              React.createElement(
                'div',
                { className: 'r-cols' },
                React.createElement(
                  'div',
                  { className: 'r-col' },
                  React.createElement(
                    'span',
                    { onContextMenu: function onContextMenu(e) {
                        e.preventDefault();_this13.removeBet('zero');
                      }, className: this.state.hs == 'zero' ? 'active' : '', onMouseOver: function onMouseOver() {
                        return _this13.setState({ hs: 'zero' });
                      }, onMouseOut: function onMouseOut() {
                        return _this13.setState({ hs: false });
                      } },
                    React.createElement(
                      'b',
                      { className: 'r-wh' },
                      '0',
                      _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('zero') !== -1 ? React.createElement(
                        'small',
                        null,
                        this.state.coupon.bets['zero'].stake
                      ) : ''
                    )
                  )
                ),
                nums.map(function (num, key) {
                  var start = num * 3;
                  return React.createElement(
                    'div',
                    { className: 'r-col', key: num },
                    _this13.rouletteNums(start)
                  );
                }),
                React.createElement(
                  'div',
                  { className: 'r-col' },
                  React.createElement(
                    'span',
                    { onContextMenu: function onContextMenu(e) {
                        e.preventDefault();_this13.removeBet('line1');
                      }, className: this.state.hs == 'line1' ? 'active' : '', onMouseOver: function onMouseOver() {
                        return _this13.setState({ hs: 'line1' });
                      }, onMouseOut: function onMouseOut() {
                        return _this13.setState({ hs: false });
                      } },
                    React.createElement(
                      'i',
                      { className: 'r-text' },
                      '2to1'
                    ),
                    _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('line1') !== -1 ? React.createElement(
                      'small',
                      null,
                      this.state.coupon.bets['line1'].stake
                    ) : ''
                  ),
                  React.createElement(
                    'span',
                    { onContextMenu: function onContextMenu(e) {
                        e.preventDefault();_this13.removeBet('line2');
                      }, className: this.state.hs == 'line2' ? 'active' : '', onMouseOver: function onMouseOver() {
                        return _this13.setState({ hs: 'line2' });
                      }, onMouseOut: function onMouseOut() {
                        return _this13.setState({ hs: false });
                      } },
                    React.createElement(
                      'i',
                      { className: 'r-text' },
                      '2to1'
                    ),
                    _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('line2') !== -1 ? React.createElement(
                      'small',
                      null,
                      this.state.coupon.bets['line2'].stake
                    ) : ''
                  ),
                  React.createElement(
                    'span',
                    { onContextMenu: function onContextMenu(e) {
                        e.preventDefault();_this13.removeBet('line3');
                      }, className: this.state.hs == 'line3' ? 'active' : '', onMouseOver: function onMouseOver() {
                        return _this13.setState({ hs: 'line3' });
                      }, onMouseOut: function onMouseOut() {
                        return _this13.setState({ hs: false });
                      } },
                    React.createElement(
                      'i',
                      { className: 'r-text' },
                      '2to1'
                    ),
                    _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('line3') !== -1 ? React.createElement(
                      'small',
                      null,
                      this.state.coupon.bets['line3'].stake
                    ) : ''
                  )
                )
              )
            ),
            React.createElement(
              'div',
              { className: 'rulet-table-alt', onClick: function onClick() {
                  return _this13.makeBet();
                } },
              React.createElement(
                'div',
                { className: 'r-cols' },
                React.createElement(
                  'div',
                  { className: 'r-col' },
                  React.createElement(
                    'span',
                    { onContextMenu: function onContextMenu(e) {
                        e.preventDefault();_this13.removeBet('1st12');
                      }, className: this.state.hs == '1st12' ? 'active' : '', onMouseOver: function onMouseOver() {
                        return _this13.setState({ hs: '1st12' });
                      }, onMouseOut: function onMouseOut() {
                        return _this13.setState({ hs: false });
                      } },
                    React.createElement(
                      'b',
                      null,
                      '1st 12'
                    ),
                    _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('1st12') !== -1 ? React.createElement(
                      'small',
                      null,
                      this.state.coupon.bets['1st12'].stake
                    ) : ''
                  ),
                  React.createElement(
                    'span',
                    null,
                    React.createElement(
                      'b',
                      { onContextMenu: function onContextMenu(e) {
                          e.preventDefault();_this13.removeBet('1to18');
                        }, className: this.state.hs == '1to18' ? 'active' : '', onMouseOver: function onMouseOver() {
                          return _this13.setState({ hs: '1to18' });
                        }, onMouseOut: function onMouseOut() {
                          return _this13.setState({ hs: false });
                        } },
                      '1 to 18',
                      _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('1to18') !== -1 ? React.createElement(
                        'small',
                        null,
                        this.state.coupon.bets['1to18'].stake
                      ) : ''
                    ),
                    React.createElement(
                      'b',
                      { onContextMenu: function onContextMenu(e) {
                          e.preventDefault();_this13.removeBet('even');
                        }, className: this.state.hs == 'even' ? 'active' : '', onMouseOver: function onMouseOver() {
                          return _this13.setState({ hs: 'even' });
                        }, onMouseOut: function onMouseOut() {
                          return _this13.setState({ hs: false });
                        } },
                      '\xC7\u0130FT',
                      _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('even') !== -1 ? React.createElement(
                        'small',
                        null,
                        this.state.coupon.bets['even'].stake
                      ) : ''
                    )
                  )
                ),
                React.createElement(
                  'div',
                  { className: 'r-col' },
                  React.createElement(
                    'span',
                    { onContextMenu: function onContextMenu(e) {
                        e.preventDefault();_this13.removeBet('2nd12');
                      }, className: this.state.hs == '2nd12' ? 'active' : '', onMouseOver: function onMouseOver() {
                        return _this13.setState({ hs: '2nd12' });
                      }, onMouseOut: function onMouseOut() {
                        return _this13.setState({ hs: false });
                      } },
                    React.createElement(
                      'b',
                      null,
                      '2nd 12'
                    ),
                    _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('2nd12') !== -1 ? React.createElement(
                      'small',
                      null,
                      this.state.coupon.bets['2nd12'].stake
                    ) : ''
                  ),
                  React.createElement(
                    'span',
                    null,
                    React.createElement(
                      'b',
                      { onContextMenu: function onContextMenu(e) {
                          e.preventDefault();_this13.removeBet('red');
                        }, className: this.state.hs == 'red' ? 'active' : '', onMouseOver: function onMouseOver() {
                          return _this13.setState({ hs: 'red' });
                        }, onMouseOut: function onMouseOut() {
                          return _this13.setState({ hs: false });
                        } },
                      React.createElement('i', { className: 'fa fa-diamond diamond-red' }),
                      _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('red') !== -1 ? React.createElement(
                        'small',
                        null,
                        this.state.coupon.bets['red'].stake
                      ) : ''
                    ),
                    React.createElement(
                      'b',
                      { onContextMenu: function onContextMenu(e) {
                          e.preventDefault();_this13.removeBet('black');
                        }, className: this.state.hs == 'black' ? 'active' : '', onMouseOver: function onMouseOver() {
                          return _this13.setState({ hs: 'black' });
                        }, onMouseOut: function onMouseOut() {
                          return _this13.setState({ hs: false });
                        } },
                      React.createElement('i', { className: 'fa fa-diamond diamond-black' }),
                      _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('black') !== -1 ? React.createElement(
                        'small',
                        null,
                        this.state.coupon.bets['black'].stake
                      ) : ''
                    )
                  )
                ),
                React.createElement(
                  'div',
                  { className: 'r-col' },
                  React.createElement(
                    'span',
                    { onContextMenu: function onContextMenu(e) {
                        e.preventDefault();_this13.removeBet('3rd12');
                      }, className: this.state.hs == '3rd12' ? 'active' : '', onMouseOver: function onMouseOver() {
                        return _this13.setState({ hs: '3rd12' });
                      }, onMouseOut: function onMouseOut() {
                        return _this13.setState({ hs: false });
                      } },
                    React.createElement(
                      'b',
                      null,
                      '3rd 12'
                    ),
                    _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('3rd12') !== -1 ? React.createElement(
                      'small',
                      null,
                      this.state.coupon.bets['3rd12'].stake
                    ) : ''
                  ),
                  React.createElement(
                    'span',
                    null,
                    React.createElement(
                      'b',
                      { onContextMenu: function onContextMenu(e) {
                          e.preventDefault();_this13.removeBet('odd');
                        }, className: this.state.hs == 'odd' ? 'active' : '', onMouseOver: function onMouseOver() {
                          return _this13.setState({ hs: 'odd' });
                        }, onMouseOut: function onMouseOut() {
                          return _this13.setState({ hs: false });
                        } },
                      'TEK',
                      _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('odd') !== -1 ? React.createElement(
                        'small',
                        null,
                        this.state.coupon.bets['odd'].stake
                      ) : ''
                    ),
                    React.createElement(
                      'b',
                      { onContextMenu: function onContextMenu(e) {
                          e.preventDefault();_this13.removeBet('19to36');
                        }, className: this.state.hs == '19to36' ? 'active' : '', onMouseOver: function onMouseOver() {
                          return _this13.setState({ hs: '19to36' });
                        }, onMouseOut: function onMouseOut() {
                          return _this13.setState({ hs: false });
                        } },
                      '19 to 36',
                      _typeof(this.state.coupon.bets) === 'object' && Object.keys(this.state.coupon.bets).indexOf('19to36') !== -1 ? React.createElement(
                        'small',
                        null,
                        this.state.coupon.bets['19to36'].stake
                      ) : ''
                    )
                  )
                )
              )
            )
          )
        ),
        React.createElement(
          'div',
          { className: 'home-right', style: { 'width': '24.5%','float': 'left' } },
          this.state.status != 'LOADING' ? React.createElement(
            'div',
            { className: 'coupon-panel', id: 'coupon' },
            React.createElement(
              'div',
              { className: 'betting-slip-head' },
              React.createElement(
                'strong',
                null,
                'KUPONUM'
              )
            ),
            this.state.couponApplied ? React.createElement(
              'div',
              { className: 'betting-slip-content' },
              React.createElement(
                'div',
                { className: 'coupon-applied' },
                React.createElement('i', { className: 'fal fa-check' }),
                React.createElement(
                  'strong',
                  null,
                  React.createElement(
                    'span',
                    { className: 'badge badge-dark' },
                    '#',
                    this.state.couponAppliedID
                  ),
                  ' numaral\u0131 kuponunuz oynanm\u0131\u015Ft\u0131r.'
                ),
                React.createElement(
                  'span',
                  null,
                  '\u015Eimdi ne yapmak istersiniz?'
                ),
                React.createElement(
                  'div',
                  { 'class': 'coupon-actions' },
                  React.createElement(
                    'span',
                    { 'class': 'btn btn-success btn-sm', onClick: function onClick() {
                        return _this13.setAppliedStatus(false);
                      } },
                    'Yeni kupon yap'
                  ),
                  React.createElement(
                    'span',
                    { 'class': 'btn btn-secondary btn-sm', onClick: function onClick() {
                        return _this13.repeatBets(_this13.state.couponAppliedID);
                      } },
                    'Bahisleri tekrarla'
                  )
                )
              )
            ) : this.couponDetail()
          ) : ''
        )
      );
    }
  }]);

  return Roulette;
}(React.Component);

function Loading() {

  return React.createElement(
    'div',
    { className: 'live-loading matches-loading' },
    React.createElement(
      'svg',
      {
        xmlns: 'http://www.w3.org/2000/svg',
        xmlnssvg: 'http://www.w3.org/2000/svg',
        xmlnsXlink: 'http://www.w3.org/1999/xlink',
        width: '64',
        height: '64',
        version: '1',
        viewBox: '0 0 128 128'
      },
      React.createElement('rect', { width: '100%', height: '100%', fill: '#FFF' }),
      React.createElement(
        'g',
        null,
        React.createElement('path', { d: 'M78.75 16.18V1.56a64.1 64.1 0 0147.7 47.7H111.8a49.98 49.98 0 00-33.07-33.08zM16.43 49.25H1.8a64.1 64.1 0 0147.7-47.7V16.2a49.98 49.98 0 00-33.07 33.07zm33.07 62.32v14.62A64.1 64.1 0 011.8 78.5h14.63a49.98 49.98 0 0033.07 33.07zm62.32-33.07h14.62a64.1 64.1 0 01-47.7 47.7v-14.63a49.98 49.98 0 0033.08-33.07z' }),
        React.createElement('animateTransform', {
          attributeName: 'transform',
          dur: '400ms',
          from: '0 64 64',
          repeatCount: 'indefinite',
          to: '-90 64 64',
          type: 'rotate'
        })
      )
    ),
    'Y\xFCkleniyor...'
  );
}

ReactDOM.render(React.createElement(Roulette, null), document.getElementById('roulette'));