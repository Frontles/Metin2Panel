(function (aN) {
    var aE, az, ax, aK, ao, aI, av, ar, aq, aC = 0, aL = {}, aB = [], aD = 0, aM = {}, aH = [], an = null, aA = new Image, al = /\.(jpg|gif|png|bmp|jpeg)(.*)?$/i, R = /[^\.]\.(swf)\s*$/i, ak, aj = 1, aG, aF, aJ = false, aw = aN.extend(aN("<div/>")[0], {prop: 0}), ay = 0, ad = !aN.support.opacity && !window.XMLHttpRequest, ai = function () {
        az.hide();
        aA.onerror = aA.onload = null;
        an && an.abort();
        aE.empty()
    }, ac = function () {
        aN.fancybox('<p id="fancybox_error">The requested content cannot be loaded.<br />Please try again later.</p>', {
            scrolling: "no",
            padding: 20,
            transitionIn: "none",
            transitionOut: "none"
        })
    }, ah = function () {
        return [aN(window).width(), aN(window).height(), aN(document).scrollLeft(), aN(document).scrollTop()]
    }, w = function () {
        var c = ah(), j = {}, h = aM.margin, i = aM.autoScale, e = (20 + h) * 2, b = (20 + h) * 2, g = aM.padding * 2;
        if (aM.width.toString().indexOf("%") > -1) {
            j.width = c[0] * parseFloat(aM.width) / 100 - 40;
            i = false
        } else {
            j.width = aM.width + g
        }
        if (aM.height.toString().indexOf("%") > -1) {
            j.height = c[1] * parseFloat(aM.height) / 100 - 40;
            i = false
        } else {
            j.height = aM.height + g
        }
        if (i && (j.width > c[0] - e || j.height > c[1] - b)) {
            if (aL.type == "image" || aL.type == "swf") {
                e += g;
                b += g;
                i = Math.min(Math.min(c[0] - e, aM.width) / aM.width, Math.min(c[1] - b, aM.height) / aM.height);
                j.width = Math.round(i * (j.width - g)) + g;
                j.height = Math.round(i * (j.height - g)) + g
            } else {
                j.width = Math.min(j.width, c[0] - e);
                j.height = Math.min(j.height, c[1] - b)
            }
        }
        j.top = c[3] + (c[1] - (j.height + 40)) * 0.5;
        j.left = c[2] + (c[0] - (j.width + 40)) * 0.5;
        if (aM.autoScale === false) {
            j.top = Math.max(c[3] + h, j.top);
            j.left = Math.max(c[2] + h, j.left)
        }
        return j
    }, t = function (b) {
        if (b && b.length) {
            switch (aM.titlePosition) {
                case"inside":
                    return b;
                case"over":
                    return '<span id="fancybox-title-over">' + b + "</span>";
                default:
                    return '<span id="fancybox-title-wrap"><span id="fancybox-title-left"></span><span id="fancybox-title-main">' + b + '</span><span id="fancybox-title-right"></span></span>'
            }
        }
        return false
    }, r = function () {
        var b = aM.title, e = aF.width - aM.padding * 2, c = "fancybox-title-" + aM.titlePosition;
        aN("#fancybox-title").remove();
        ay = 0;
        if (aM.titleShow !== false) {
            b = aN.isFunction(aM.titleFormat) ? aM.titleFormat(b, aH, aD, aM) : t(b);
            if (!(!b || b === "")) {
                aN('<div id="fancybox-title" class="' + c + '" />').css({
                    width: e,
                    paddingLeft: aM.padding,
                    paddingRight: aM.padding
                }).html(b).appendTo("body");
                switch (aM.titlePosition) {
                    case"inside":
                        ay = aN("#fancybox-title").outerHeight(true) - aM.padding;
                        aF.height += ay;
                        break;
                    case"over":
                        aN("#fancybox-title").css("bottom", aM.padding);
                        break;
                    default:
                        aN("#fancybox-title").css("bottom", aN("#fancybox-title").outerHeight(true) * -1);
                        break
                }
                aN("#fancybox-title").appendTo(ao).hide()
            }
        }
    }, o = function () {
        aN(document).unbind("keydown.fb").bind("keydown.fb", function (b) {
            if (b.keyCode == 27 && aM.enableEscapeButton) {
                b.preventDefault();
                aN.fancybox.close()
            } else {
                if (b.keyCode == 37) {
                    b.preventDefault();
                    aN.fancybox.prev()
                } else {
                    if (b.keyCode == 39) {
                        b.preventDefault();
                        aN.fancybox.next()
                    }
                }
            }
        });
        if (aN.fn.mousewheel) {
            aK.unbind("mousewheel.fb");
            aH.length > 1 && aK.bind("mousewheel.fb", function (b, c) {
                b.preventDefault();
                aJ || c === 0 || (c > 0 ? aN.fancybox.prev() : aN.fancybox.next())
            })
        }
        if (aM.showNavArrows) {
            if (aM.cyclic && aH.length > 1 || aD !== 0) {
                ar.show()
            }
            if (aM.cyclic && aH.length > 1 || aD != aH.length - 1) {
                aq.show()
            }
        }
    }, f = function () {
        var b, c;
        if (aH.length - 1 > aD) {
            b = aH[aD + 1].href;
            if (typeof b !== "undefined" && b.match(al)) {
                c = new Image;
                c.src = b
            }
        }
        if (aD > 0) {
            b = aH[aD - 1].href;
            if (typeof b !== "undefined" && b.match(al)) {
                c = new Image;
                c.src = b
            }
        }
    }, ag = function () {
        aI.css("overflow", aM.scrolling == "auto" ? aM.type == "image" || aM.type == "iframe" || aM.type == "swf" ? "hidden" : "auto" : aM.scrolling == "yes" ? "auto" : "visible");
        if (!aN.support.opacity) {
            // aI.get(0).style.removeAttribute("filter");
            // aK.get(0).style.removeAttribute("filter")
        }
        aN("#fancybox-title").show();
        aM.hideOnContentClick && aI.one("click", aN.fancybox.close);
        aM.hideOnOverlayClick && ax.one("click", aN.fancybox.close);
        aM.showCloseButton && av.show();
        o();
        aN(window).bind("resize.fb", aN.fancybox.center);
        aM.centerOnScroll ? aN(window).bind("scroll.fb", aN.fancybox.center) : aN(window).unbind("scroll.fb");
        aN.isFunction(aM.onComplete) && aM.onComplete(aH, aD, aM);
        aJ = false;
        f()
    }, af = function (b) {
        var h = Math.round(aG.width + (aF.width - aG.width) * b), e = Math.round(aG.height + (aF.height - aG.height) * b), g = Math.round(aG.top + (aF.top - aG.top) * b), c = Math.round(aG.left + (aF.left - aG.left) * b);
        aK.css({width: h + "px", height: e + "px", top: g + "px", left: c + "px"});
        h = Math.max(h - aM.padding * 2, 0);
        e = Math.max(e - (aM.padding * 2 + ay * b), 0);
        aI.css({width: h + "px", height: e + "px"});
        if (typeof aF.opacity !== "undefined") {
            aK.css("opacity", b < 0.5 ? 0.5 : b)
        }
    }, d = function (b) {
        var c = b.offset();
        c.top += parseFloat(b.css("paddingTop")) || 0;
        c.left += parseFloat(b.css("paddingLeft")) || 0;
        c.top += parseFloat(b.css("border-top-width")) || 0;
        c.left += parseFloat(b.css("border-left-width")) || 0;
        c.width = b.width();
        c.height = b.height();
        return c
    }, ab = function () {
        var b = aL.orig ? aN(aL.orig) : false, c = {};
        if (b && b.length) {
            b = d(b);
            c = {
                width: b.width + aM.padding * 2,
                height: b.height + aM.padding * 2,
                top: b.top - aM.padding - 20,
                left: b.left - aM.padding - 20
            }
        } else {
            b = ah();
            c = {width: 1, height: 1, top: b[3] + b[1] * 0.5, left: b[2] + b[0] * 0.5}
        }
        return c
    }, ae = function () {
        az.hide();
        if (aK.is(":visible") && aN.isFunction(aM.onCleanup)) {
            if (aM.onCleanup(aH, aD, aM) === false) {
                aN.event.trigger("fancybox-cancel");
                aJ = false;
                return
            }
        }
        aH = aB;
        aD = aC;
        aM = aL;
        aI.get(0).scrollTop = 0;
        aI.get(0).scrollLeft = 0;
        if (aM.overlayShow) {
            ad && aN("select:not(#fancybox-tmp select)").filter(function () {
                return this.style.visibility !== "hidden"
            }).css({visibility: "hidden"}).one("fancybox-cleanup", function () {
                this.style.visibility = "inherit"
            });
            ax.css({"background-color": aM.overlayColor, opacity: aM.overlayOpacity}).unbind().show()
        }
        aF = w();
        r();
        if (aK.is(":visible")) {
            aN(av.add(ar).add(aq)).hide();
            var b = aK.position(), c;
            aG = {top: b.top, left: b.left, width: aK.width(), height: aK.height()};
            c = aG.width == aF.width && aG.height == aF.height;
            aI.fadeOut(aM.changeFade, function () {
                var e = function () {
                    aI.html(aE.contents()).fadeIn(aM.changeFade, ag)
                };
                aN.event.trigger("fancybox-change");
                aI.empty().css("overflow", "hidden");
                if (c) {
                    aI.css({
                        top: aM.padding,
                        left: aM.padding,
                        width: Math.max(aF.width - aM.padding * 2, 1),
                        height: Math.max(aF.height - aM.padding * 2 - ay, 1)
                    });
                    e()
                } else {
                    aI.css({
                        top: aM.padding,
                        left: aM.padding,
                        width: Math.max(aG.width - aM.padding * 2, 1),
                        height: Math.max(aG.height - aM.padding * 2, 1)
                    });
                    aw.prop = 0;
                    aN(aw).animate({prop: 1}, {
                        duration: aM.changeSpeed,
                        easing: aM.easingChange,
                        step: af,
                        complete: e
                    })
                }
            })
        } else {
            aK.css("opacity", 1);
            if (aM.transitionIn == "elastic") {
                aG = ab();
                aI.css({
                    top: aM.padding,
                    left: aM.padding,
                    width: Math.max(aG.width - aM.padding * 2, 1),
                    height: Math.max(aG.height - aM.padding * 2, 1)
                }).html(aE.contents());
                aK.css(aG).show();
                if (aM.opacity) {
                    aF.opacity = 0
                }
                aw.prop = 0;
                aN(aw).animate({prop: 1}, {duration: aM.speedIn, easing: aM.easingIn, step: af, complete: ag})
            } else {
                aI.css({
                    top: aM.padding,
                    left: aM.padding,
                    width: Math.max(aF.width - aM.padding * 2, 1),
                    height: Math.max(aF.height - aM.padding * 2 - ay, 1)
                }).html(aE.contents());
                aK.css(aF).fadeIn(aM.transitionIn == "none" ? 0 : aM.speedIn, ag)
            }
        }
    }, am = function () {
        aE.width(aL.width);
        aE.height(aL.height);
        if (aL.width == "auto") {
            aL.width = aE.width()
        }
        if (aL.height == "auto") {
            aL.height = aE.height()
        }
        ae()
    }, a = function () {
        aJ = true;
        aL.width = aA.width;
        aL.height = aA.height;
        aN("<img />").attr({id: "fancybox-img", src: aA.src, alt: aL.title}).appendTo(aE);
        ae()
    }, ap = function () {
        ai();
        var c = aB[aC], i, g, h, e, b;
        aL = aN.extend({}, aN.fn.fancybox.defaults, typeof aN(c).data("fancybox") == "undefined" ? aL : aN(c).data("fancybox"));
        h = c.title || aN(c).title || aL.title || "";
        if (c.nodeName && !aL.orig) {
            aL.orig = aN(c).children("img:first").length ? aN(c).children("img:first") : aN(c)
        }
        if (h === "" && aL.orig) {
            h = aL.orig.attr("alt")
        }
        i = c.nodeName && /^(?:javascript|#)/i.test(c.href) ? aL.href || null : aL.href || c.href || null;
        if (aL.type) {
            g = aL.type;
            if (!i) {
                i = aL.content
            }
        } else {
            if (aL.content) {
                g = "html"
            } else {
                if (i) {
                    if (i.match(al)) {
                        g = "image"
                    } else {
                        if (i.match(R)) {
                            g = "swf"
                        } else {
                            if (aN(c).hasClass("iframe")) {
                                g = "iframe"
                            } else {
                                if (i.match(/#/)) {
                                    c = i.substr(i.indexOf("#"));
                                    g = aN(c).length > 0 ? "inline" : "ajax"
                                } else {
                                    g = "ajax"
                                }
                            }
                        }
                    }
                } else {
                    g = "inline"
                }
            }
        }
        aL.type = g;
        aL.href = i;
        aL.title = h;
        if (aL.autoDimensions && aL.type !== "iframe" && aL.type !== "swf") {
            aL.width = "auto";
            aL.height = "auto"
        }
        if (aL.modal) {
            aL.overlayShow = true;
            aL.hideOnOverlayClick = false;
            aL.hideOnContentClick = false;
            aL.enableEscapeButton = false;
            aL.showCloseButton = false
        }
        if (aN.isFunction(aL.onStart)) {
            if (aL.onStart(aB, aC, aL) === false) {
                aJ = false;
                return
            }
        }
        aE.css("padding", 20 + aL.padding + aL.margin);
        aN(".fancybox-inline-tmp").unbind("fancybox-cancel").bind("fancybox-change", function () {
            aN(this).replaceWith(aI.children())
        });
        switch (g) {
            case"html":
                aE.html(aL.content);
                am();
                break;
            case"inline":
                aN('<div class="fancybox-inline-tmp" />').hide().insertBefore(aN(c)).bind("fancybox-cleanup", function () {
                    aN(this).replaceWith(aI.children())
                }).bind("fancybox-cancel", function () {
                    aN(this).replaceWith(aE.children())
                });
                aN(c).appendTo(aE);
                am();
                break;
            case"image":
                aJ = false;
                aN.fancybox.showActivity();
                aA = new Image;
                aA.onerror = function () {
                    ac()
                };
                aA.onload = function () {
                    aA.onerror = null;
                    aA.onload = null;
                    a()
                };
                aA.src = i;
                break;
            case"swf":
                e = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="' + aL.width + '" height="' + aL.height + '"><param name="movie" value="' + i + '"></param>';
                b = "";
                aN.each(aL.swf, function (k, j) {
                    e += '<param name="' + k + '" value="' + j + '"></param>';
                    b += " " + k + '="' + j + '"'
                });
                e += '<embed src="' + i + '" type="application/x-shockwave-flash" width="' + aL.width + '" height="' + aL.height + '"' + b + "></embed></object>";
                aE.html(e);
                am();
                break;
            case"ajax":
                c = i.split("#", 2);
                g = aL.ajax.data || {};
                if (c.length > 1) {
                    i = c[0];
                    if (typeof g == "string") {
                        g += "&selector=" + c[1]
                    } else {
                        g.selector = c[1]
                    }
                }
                aJ = false;
                aN.fancybox.showActivity();
                an = aN.ajax(aN.extend(aL.ajax, {
                    url: i, data: g, error: ac, success: function (j) {
                        if (an.status == 200) {
                            aE.html(j);
                            am()
                        }
                    }
                }));
                break;
            case"iframe":
                aN('<iframe id="fancybox-frame" name="fancybox-frame' + (new Date).getTime() + '" frameborder="0" hspace="0" scrolling="' + aL.scrolling + '" src="' + aL.href + '"></iframe>').appendTo(aE);
                ae();
                break
        }
    }, au = function () {
        if (az.is(":visible")) {
            aN("div", az).css("top", aj * -40 + "px");
            aj = (aj + 1) % 12
        } else {
            clearInterval(ak)
        }
    }, at = function () {
        if (!aN("#fancybox-wrap").length) {
            aN("body").append(aE = aN('<div id="fancybox-tmp"></div>'), az = aN('<div id="fancybox-loading"><div></div></div>'), ax = aN('<div id="fancybox-overlay"></div>'), aK = aN('<div id="fancybox-wrap"></div>'));
            if (!aN.support.opacity) {
                aK.addClass("fancybox-ie");
                az.addClass("fancybox-ie")
            }
            ao = aN('<div id="fancybox-outer"></div>').append('<div class="fancy-bg" id="fancy-bg-n"></div><div class="fancy-bg" id="fancy-bg-ne"></div><div class="fancy-bg" id="fancy-bg-e"></div><div class="fancy-bg" id="fancy-bg-se"></div><div class="fancy-bg" id="fancy-bg-s"></div><div class="fancy-bg" id="fancy-bg-sw"></div><div class="fancy-bg" id="fancy-bg-w"></div><div class="fancy-bg" id="fancy-bg-nw"></div>').appendTo(aK);
            ao.append(aI = aN('<div id="fancybox-inner"></div>'), av = aN('<a id="fancybox-close"></a>'), ar = aN('<a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a>'), aq = aN('<a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a>'));
            av.click(aN.fancybox.close);
            az.click(aN.fancybox.cancel);
            ar.click(function (b) {
                b.preventDefault();
                aN.fancybox.prev()
            });
            aq.click(function (b) {
                b.preventDefault();
                aN.fancybox.next()
            });
            if (ad) {
                ax.get(0).style.setExpression("height", "document.body.scrollHeight > document.body.offsetHeight ? document.body.scrollHeight : document.body.offsetHeight + 'px'");
                az.get(0).style.setExpression("top", "(-20 + (document.documentElement.clientHeight ? document.documentElement.clientHeight/2 : document.body.clientHeight/2 ) + ( ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop )) + 'px'");
                ao.prepend('<iframe id="fancybox-hide-sel-frame" src="javascript:\'\';" scrolling="no" frameborder="0" ></iframe>')
            }
        }
    };
    aN.fn.fancybox = function (b) {
        aN(this).data("fancybox", aN.extend({}, b, aN.metadata ? aN(this).metadata() : {})).unbind("click.fb").bind("click.fb", function (c) {
            c.preventDefault();
            if (!aJ) {
                aJ = true;
                aN(this).blur();
                aB = [];
                aC = 0;
                c = aN(this).attr("rel") || "";
                if (!c || c == "" || c === "nofollow") {
                    aB.push(this)
                } else {
                    aB = aN("a[rel=" + c + "], area[rel=" + c + "]");
                    aC = aB.index(this)
                }
                ap();
                return false
            }
        });
        return this
    };
    aN.fancybox = function (b, g) {
        if (!aJ) {
            aJ = true;
            g = typeof g !== "undefined" ? g : {};
            aB = [];
            aC = g.index || 0;
            if (aN.isArray(b)) {
                for (var c = 0, e = b.length; c < e; c++) {
                    if (typeof b[c] == "object") {
                        aN(b[c]).data("fancybox", aN.extend({}, g, b[c]))
                    } else {
                        b[c] = aN({}).data("fancybox", aN.extend({content: b[c]}, g))
                    }
                }
                aB = jQuery.merge(aB, b)
            } else {
                if (typeof b == "object") {
                    aN(b).data("fancybox", aN.extend({}, g, b))
                } else {
                    b = aN({}).data("fancybox", aN.extend({content: b}, g))
                }
                aB.push(b)
            }
            if (aC > aB.length || aC < 0) {
                aC = 0
            }
            ap()
        }
    };
    aN.fancybox.showActivity = function () {
        clearInterval(ak);
        az.show();
        ak = setInterval(au, 66)
    };
    aN.fancybox.hideActivity = function () {
        az.hide()
    };
    aN.fancybox.next = function () {
        return aN.fancybox.pos(aD + 1)
    };
    aN.fancybox.prev = function () {
        return aN.fancybox.pos(aD - 1)
    };
    aN.fancybox.pos = function (b) {
        if (!aJ) {
            b = parseInt(b, 10);
            if (b > -1 && aH.length > b) {
                aC = b;
                ap()
            }
            if (aM.cyclic && aH.length > 1 && b < 0) {
                aC = aH.length - 1;
                ap()
            }
            if (aM.cyclic && aH.length > 1 && b >= aH.length) {
                aC = 0;
                ap()
            }
        }
    };
    aN.fancybox.cancel = function () {
        if (!aJ) {
            aJ = true;
            aN.event.trigger("fancybox-cancel");
            ai();
            aL && aN.isFunction(aL.onCancel) && aL.onCancel(aB, aC, aL);
            aJ = false
        }
    };
    aN.fancybox.close = function () {
        function b() {
            ax.fadeOut("fast");
            aK.hide();
            aN.event.trigger("fancybox-cleanup");
            aI.empty();
            aN.isFunction(aM.onClosed) && aM.onClosed(aH, aD, aM);
            aH = aL = [];
            aD = aC = 0;
            aM = aL = {};
            aJ = false
        }

        if (!(aJ || aK.is(":hidden"))) {
            aJ = true;
            if (aM && aN.isFunction(aM.onCleanup)) {
                if (aM.onCleanup(aH, aD, aM) === false) {
                    aJ = false;
                    return
                }
            }
            ai();
            aN(av.add(ar).add(aq)).hide();
            aN("#fancybox-title").remove();
            aK.add(aI).add(ax).unbind();
            aN(window).unbind("resize.fb scroll.fb");
            aN(document).unbind("keydown.fb");
            aI.css("overflow", "hidden");
            if (aM.transitionOut == "elastic") {
                aG = ab();
                var c = aK.position();
                aF = {top: c.top, left: c.left, width: aK.width(), height: aK.height()};
                if (aM.opacity) {
                    aF.opacity = 1
                }
                aw.prop = 1;
                aN(aw).animate({prop: 0}, {duration: aM.speedOut, easing: aM.easingOut, step: af, complete: b})
            } else {
                aK.fadeOut(aM.transitionOut == "none" ? 0 : aM.speedOut, b)
            }
        }
    };
    aN.fancybox.resize = function () {
        var b, c;
        if (!(aJ || aK.is(":hidden"))) {
            aJ = true;
            b = aI.wrapInner("<div style='overflow:auto'></div>").children();
            c = b.height();
            aK.css({height: c + aM.padding * 2 + ay});
            aI.css({height: c});
            b.replaceWith(b.children());
            aN.fancybox.center()
        }
    };
    aN.fancybox.center = function () {
        aJ = true;
        var b = ah(), e = aM.margin, c = {};
        c.top = b[3] + (b[1] - (aK.height() - ay + 40)) * 0.5;
        c.left = b[2] + (b[0] - (aK.width() + 40)) * 0.5;
        c.top = Math.max(b[3] + e, c.top);
        c.left = Math.max(b[2] + e, c.left);
        aK.css(c);
        aJ = false
    };
    aN.fn.fancybox.defaults = {
        padding: 10,
        margin: 20,
        opacity: false,
        modal: false,
        cyclic: false,
        scrolling: "auto",
        width: 560,
        height: 340,
        autoScale: true,
        autoDimensions: true,
        centerOnScroll: false,
        ajax: {},
        swf: {wmode: "transparent"},
        hideOnOverlayClick: true,
        hideOnContentClick: false,
        overlayShow: true,
        overlayOpacity: 0.3,
        overlayColor: "#666",
        titleShow: true,
        titlePosition: "outside",
        titleFormat: null,
        transitionIn: "fade",
        transitionOut: "fade",
        speedIn: 300,
        speedOut: 300,
        changeSpeed: 300,
        changeFade: "fast",
        easingIn: "swing",
        easingOut: "swing",
        showCloseButton: true,
        showNavArrows: true,
        enableEscapeButton: true,
        onStart: null,
        onCancel: null,
        onComplete: null,
        onCleanup: null,
        onClosed: null
    };
    aN(document).ready(function () {
        at()
    })
})(jQuery);