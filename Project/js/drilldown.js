/*
 Highcharts JS v5.0.12 (2017-05-24)
 Highcharts Drilldown module

 Author: Torstein Honsi
 License: www.highcharts.com/license

*/
(function(n) {
 "object" === typeof module && module.exports ? module.exports = n : n(Highcharts)
})(function(n) {
 (function(f) {
  var n = f.noop,
   y = f.color,
   z = f.defaultOptions,
   h = f.each,
   p = f.extend,
   G = f.format,
   A = f.objectEach,
   B = f.pick,
   u = f.wrap,
   q = f.Chart,
   v = f.seriesTypes,
   C = v.pie,
   r = v.column,
   D = f.Tick,
   w = f.fireEvent,
   E = f.inArray,
   F = 1;
  p(z.lang, {
   drillUpText: "\u25c1 Back to {series.name}"
  });
  z.drilldown = {
   activeAxisLabelStyle: {
    cursor: "pointer",
    color: "#003399",
    fontWeight: "bold",
    textDecoration: "underline"
   },
   activeDataLabelStyle: {
    cursor: "pointer",
    color: "#003399",
    fontWeight: "bold",
    textDecoration: "underline"
   },
   animation: {
    duration: 500
   },
   drillUpButton: {
    position: {
     align: "right",
     x: -10,
     y: 10
    }
   }
  };
  f.SVGRenderer.prototype.Element.prototype.fadeIn = function(b) {
   this.attr({
    opacity: .1,
    visibility: "inherit"
   }).animate({
    opacity: B(this.newOpacity, 1)
   }, b || {
    duration: 250
   })
  };
  q.prototype.addSeriesAsDrilldown = function(b, a) {
   this.addSingleSeriesAsDrilldown(b, a);
   this.applyDrilldown()
  };
  q.prototype.addSingleSeriesAsDrilldown = function(b, a) {
   var d = b.series,
    c = d.xAxis,
    e = d.yAxis,
    g,
    l = [],
    k = [],
    t, m, x;
   x = {
    color: b.color || d.color
   };
   this.drilldownLevels || (this.drilldownLevels = []);
   t = d.options._levelNumber || 0;
   (m = this.drilldownLevels[this.drilldownLevels.length - 1]) && m.levelNumber !== t && (m = void 0);
   a = p(p({
    _ddSeriesId: F++
   }, x), a);
   g = E(b, d.points);
   h(d.chart.series, function(a) {
    a.xAxis !== c || a.isDrilling || (a.options._ddSeriesId = a.options._ddSeriesId || F++, a.options._colorIndex = a.userOptions._colorIndex, a.options._levelNumber = a.options._levelNumber || t, m ? (l = m.levelSeries, k = m.levelSeriesOptions) : (l.push(a),
     k.push(a.options)))
   });
   b = p({
    levelNumber: t,
    seriesOptions: d.options,
    levelSeriesOptions: k,
    levelSeries: l,
    shapeArgs: b.shapeArgs,
    bBox: b.graphic ? b.graphic.getBBox() : {},
    color: b.isNull ? (new f.Color(y)).setOpacity(0).get() : y,
    lowerSeriesOptions: a,
    pointOptions: d.options.data[g],
    pointIndex: g,
    oldExtremes: {
     xMin: c && c.userMin,
     xMax: c && c.userMax,
     yMin: e && e.userMin,
     yMax: e && e.userMax
    }
   }, x);
   this.drilldownLevels.push(b);
   c && c.names && (c.names.length = 0);
   a = b.lowerSeries = this.addSeries(a, !1);
   a.options._levelNumber = t + 1;
   c && (c.oldPos =
    c.pos, c.userMin = c.userMax = null, e.userMin = e.userMax = null);
   d.type === a.type && (a.animate = a.animateDrilldown || n, a.options.animation = !0)
  };
  q.prototype.applyDrilldown = function() {
   var b = this.drilldownLevels,
    a;
   b && 0 < b.length && (a = b[b.length - 1].levelNumber, h(this.drilldownLevels, function(b) {
    b.levelNumber === a && h(b.levelSeries, function(c) {
     c.options && c.options._levelNumber === a && c.remove(!1)
    })
   }));
   this.redraw();
   this.showDrillUpButton()
  };
  q.prototype.getDrilldownBackText = function() {
   var b = this.drilldownLevels;
   if (b && 0 <
    b.length) return b = b[b.length - 1], b.series = b.seriesOptions, G(this.options.lang.drillUpText, b)
  };
  q.prototype.showDrillUpButton = function() {
   var b = this,
    a = this.getDrilldownBackText(),
    d = b.options.drilldown.drillUpButton,
    c, e;
   this.drillUpButton ? this.drillUpButton.attr({
    text: a
   }).align() : (e = (c = d.theme) && c.states, this.drillUpButton = this.renderer.button(a, null, null, function() {
    b.drillUp()
   }, c, e && e.hover, e && e.select).addClass("highcharts-drillup-button").attr({
    align: d.position.align,
    zIndex: 7
   }).add().align(d.position, !1, d.relativeTo || "plotBox"))
  };
  q.prototype.drillUp = function() {
   for (var b = this, a = b.drilldownLevels, d = a[a.length - 1].levelNumber, c = a.length, e = b.series, g, l, k, f, m = function(a) {
     var c;
     h(e, function(b) {
      b.options._ddSeriesId === a._ddSeriesId && (c = b)
     });
     c = c || b.addSeries(a, !1);
     c.type === k.type && c.animateDrillupTo && (c.animate = c.animateDrillupTo);
     a === l.seriesOptions && (f = c)
    }; c--;)
    if (l = a[c], l.levelNumber === d) {
     a.pop();
     k = l.lowerSeries;
     if (!k.chart)
      for (g = e.length; g--;)
       if (e[g].options.id === l.lowerSeriesOptions.id && e[g].options._levelNumber ===
        d + 1) {
        k = e[g];
        break
       }
     k.xData = [];
     h(l.levelSeriesOptions, m);
     w(b, "drillup", {
      seriesOptions: l.seriesOptions
     });
     f.type === k.type && (f.drilldownLevel = l, f.options.animation = b.options.drilldown.animation, k.animateDrillupFrom && k.chart && k.animateDrillupFrom(l));
     f.options._levelNumber = d;
     k.remove(!1);
     f.xAxis && (g = l.oldExtremes, f.xAxis.setExtremes(g.xMin, g.xMax, !1), f.yAxis.setExtremes(g.yMin, g.yMax, !1))
    }
   w(b, "drillupall");
   this.redraw();
   0 === this.drilldownLevels.length ? this.drillUpButton = this.drillUpButton.destroy() : this.drillUpButton.attr({
    text: this.getDrilldownBackText()
   }).align();
   this.ddDupes.length = []
  };
  r.prototype.supportsDrilldown = !0;
  r.prototype.animateDrillupTo = function(b) {
   if (!b) {
    var a = this,
     d = a.drilldownLevel;
    h(this.points, function(a) {
     var c = a.dataLabel;
     a.graphic && a.graphic.hide();
     c && (c.hidden = "hidden" === c.attr("visibility"), c.hidden || (c.hide(), a.connector && a.connector.hide()))
    });
    setTimeout(function() {
     a.points && h(a.points, function(a, b) {
      b = b === (d && d.pointIndex) ? "show" : "fadeIn";
      var c = "show" === b ? !0 : void 0,
       e = a.dataLabel;
      if (a.graphic) a.graphic[b](c);
      if (e && !e.hidden && (e[b](c),
        a.connector)) a.connector[b](c)
     })
    }, Math.max(this.chart.options.drilldown.animation.duration - 50, 0));
    this.animate = n
   }
  };
  r.prototype.animateDrilldown = function(b) {
   var a = this,
    d = this.chart.drilldownLevels,
    c, e = this.chart.options.drilldown.animation,
    g = this.xAxis;
   b || (h(d, function(b) {
    a.options._ddSeriesId === b.lowerSeriesOptions._ddSeriesId && (c = b.shapeArgs, c.fill = b.color)
   }), c.x += B(g.oldPos, g.pos) - g.pos, h(this.points, function(b) {
    b.shapeArgs.fill = b.color;
    b.graphic && b.graphic.attr(c).animate(p(b.shapeArgs, {
     fill: b.color ||
      a.color
    }), e);
    b.dataLabel && b.dataLabel.fadeIn(e)
   }), this.animate = null)
  };
  r.prototype.animateDrillupFrom = function(b) {
   var a = this.chart.options.drilldown.animation,
    d = this.group,
    c = d !== this.chart.seriesGroup,
    e = this;
   h(e.trackerGroups, function(a) {
    if (e[a]) e[a].on("mouseover")
   });
   c && delete this.group;
   h(this.points, function(e) {
    var g = e.graphic,
     k = b.shapeArgs,
     h = function() {
      g.destroy();
      d && c && (d = d.destroy())
     };
    g && (delete e.graphic, k.fill = b.color, a ? g.animate(k, f.merge(a, {
     complete: h
    })) : (g.attr(k), h()))
   })
  };
  C && p(C.prototype, {
   supportsDrilldown: !0,
   animateDrillupTo: r.prototype.animateDrillupTo,
   animateDrillupFrom: r.prototype.animateDrillupFrom,
   animateDrilldown: function(b) {
    var a = this.chart.drilldownLevels[this.chart.drilldownLevels.length - 1],
     d = this.chart.options.drilldown.animation,
     c = a.shapeArgs,
     e = c.start,
     g = (c.end - e) / this.points.length;
    b || (h(this.points, function(b, k) {
      var h = b.shapeArgs;
      c.fill = a.color;
      h.fill = b.color;
      if (b.graphic) b.graphic.attr(f.merge(c, {
       start: e + k * g,
       end: e + (k + 1) * g
      }))[d ? "animate" : "attr"](h, d)
     }), this.animate =
     null)
   }
  });
  f.Point.prototype.doDrilldown = function(b, a, d) {
   var c = this.series.chart,
    e = c.options.drilldown,
    g = (e.series || []).length,
    f;
   c.ddDupes || (c.ddDupes = []);
   for (; g-- && !f;) e.series[g].id === this.drilldown && -1 === E(this.drilldown, c.ddDupes) && (f = e.series[g], c.ddDupes.push(this.drilldown));
   w(c, "drilldown", {
    point: this,
    seriesOptions: f,
    category: a,
    originalEvent: d,
    points: void 0 !== a && this.series.xAxis.getDDPoints(a).slice(0)
   }, function(a) {
    var c = a.point.series && a.point.series.chart,
     d = a.seriesOptions;
    c && d && (b ? c.addSingleSeriesAsDrilldown(a.point,
     d) : c.addSeriesAsDrilldown(a.point, d))
   })
  };
  f.Axis.prototype.drilldownCategory = function(b, a) {
   A(this.getDDPoints(b), function(d) {
    d && d.series && d.series.visible && d.doDrilldown && d.doDrilldown(!0, b, a)
   });
   this.chart.applyDrilldown()
  };
  f.Axis.prototype.getDDPoints = function(b) {
   var a = [];
   h(this.series, function(d) {
    var c, e = d.xData,
     f = d.points;
    for (c = 0; c < e.length; c++)
     if (e[c] === b && d.options.data[c] && d.options.data[c].drilldown) {
      a.push(f ? f[c] : !0);
      break
     }
   });
   return a
  };
  D.prototype.drillable = function() {
   var b = this.pos,
    a = this.label,
    d = this.axis,
    c = "xAxis" === d.coll && d.getDDPoints,
    e = c && d.getDDPoints(b);
   c && (a && e.length ? (a.drillable = !0, a.basicStyles || (a.basicStyles = f.merge(a.styles)), a.addClass("highcharts-drilldown-axis-label").css(d.chart.options.drilldown.activeAxisLabelStyle).on("click", function(a) {
    d.drilldownCategory(b, a)
   })) : a && a.drillable && (a.styles = {}, a.css(a.basicStyles), a.on("click", null), a.removeClass("highcharts-drilldown-axis-label")))
  };
  u(D.prototype, "addLabel", function(b) {
   b.call(this);
   this.drillable()
  });
  u(f.Point.prototype,
   "init",
   function(b, a, d, c) {
    var e = b.call(this, a, d, c);
    c = (b = a.xAxis) && b.ticks[c];
    e.drilldown && f.addEvent(e, "click", function(b) {
     a.xAxis && !1 === a.chart.options.drilldown.allowPointDrilldown ? a.xAxis.drilldownCategory(e.x, b) : e.doDrilldown(void 0, void 0, b)
    });
    c && c.drillable();
    return e
   });
  u(f.Series.prototype, "drawDataLabels", function(b) {
   var a = this.chart.options.drilldown.activeDataLabelStyle,
    d = this.chart.renderer;
   b.call(this);
   h(this.points, function(b) {
    var c = {};
    b.drilldown && b.dataLabel && ("contrast" === a.color &&
     (c.color = d.getContrast(b.color || this.color)), b.dataLabel.addClass("highcharts-drilldown-data-label"), b.dataLabel.css(a).css(c))
   }, this)
  });
  var H = function(b) {
   b.call(this);
   h(this.points, function(a) {
    a.drilldown && a.graphic && (a.graphic.addClass("highcharts-drilldown-point"), a.graphic.css({
     cursor: "pointer"
    }))
   })
  };
  A(v, function(b) {
   b.prototype.supportsDrilldown && u(b.prototype, "drawTracker", H)
  })
 })(n)
});