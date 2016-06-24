/**
 * Created by Yasir
 */
/**
 * Created by Yasir
 */
;(function(window) {
    var
// Is Modernizr defined on the global scope
        Modernizr = typeof Modernizr !== "undefined" ? Modernizr : false,
// whether or not is a touch device
        isTouchDevice = Modernizr ? Modernizr.touch : !!('ontouchstart' in window || 'onmsgesturechange' in window),
// Are we expecting a touch or a click?
        buttonPressedEvent = (isTouchDevice) ? 'touchstart' : 'click',
        Pb = function() {
            this.init();
        };
// Initialization method
    Pb.prototype.init = function() {
        this.isTouchDevice = isTouchDevice;
        this.buttonPressedEvent = buttonPressedEvent;
    };
    Pb.prototype.getViewportHeight = function() {
        var docElement = document.documentElement,
            client = docElement.clientHeight,
            inner = window.innerHeight;
        if (client < inner)
            return inner;
        else
            return client;
    };
    Pb.prototype.getViewportWidth = function() {
        var docElement = document.documentElement,
            client = docElement.clientWidth,
            inner = window.innerWidth;
        if (client < inner)
            return inner;
        else
            return client;
    };
// Creates a "Pb" object.
    window.Pb = new Pb();
})(this);
;(function($){
    "use strict";
    Pb.notification = function(text,notyficationType) {
        /*----------- BEGIN validationEngine CODE -------------------------*/
        noty({
            text: text,
            type: notyficationType,
            theme: 'defaultTheme',
            timeout:3600,
            closeWith: ['click']
        });
        /*----------- END validate CODE -------------------------*/
    };
    return Pb;
})(jQuery);