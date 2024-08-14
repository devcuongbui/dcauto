(() => {
  function e(e) {
    if ("immediatePropagationStopped" in e) return e;
    {
      const { stopImmediatePropagation: t } = e;
      return Object.assign(e, {
        immediatePropagationStopped: !1,
        stopImmediatePropagation() {
          (this.immediatePropagationStopped = !0), t.call(this);
        },
      });
    }
  }
  function t(e) {
    const t = e.trim().match(Fe) || [];
    return {
      eventTarget: n(t[4]),
      eventName: t[2],
      eventOptions: t[9] ? i(t[9]) : {},
      identifier: t[5],
      methodName: t[7],
    };
  }
  function n(e) {
    return "window" == e ? window : "document" == e ? document : void 0;
  }
  function i(e) {
    return e
      .split(":")
      .reduce(
        (e, t) => Object.assign(e, { [t.replace(/^!/, "")]: !/^!/.test(t) }),
        {}
      );
  }
  function r(e) {
    return e == window ? "window" : e == document ? "document" : void 0;
  }
  function o(e) {
    return e.replace(/(?:[_-])([a-z0-9])/g, (e, t) => t.toUpperCase());
  }
  function s(e) {
    return e.charAt(0).toUpperCase() + e.slice(1);
  }
  function a(e) {
    return e.replace(/([A-Z])/g, (e, t) => `-${t.toLowerCase()}`);
  }
  function l(e) {
    return e.match(/[^\s]+/g) || [];
  }
  function u(e) {
    const t = e.tagName.toLowerCase();
    if (t in Pe) return Pe[t](e);
  }
  function c(e) {
    throw new Error(e);
  }
  function d(e) {
    try {
      return JSON.parse(e);
    } catch (t) {
      return e;
    }
  }
  function f(e, t, n) {
    p(e, t).add(n);
  }
  function h(e, t, n) {
    p(e, t).delete(n), m(e, t);
  }
  function p(e, t) {
    let n = e.get(t);
    return n || ((n = new Set()), e.set(t, n)), n;
  }
  function m(e, t) {
    const n = e.get(t);
    null != n && 0 == n.size && e.delete(t);
  }
  function g(e, t, n) {
    return e
      .trim()
      .split(/\s+/)
      .filter((e) => e.length)
      .map((e, i) => ({ element: t, attributeName: n, content: e, index: i }));
  }
  function v(e, t) {
    const n = Math.max(e.length, t.length);
    return Array.from({ length: n }, (n, i) => [e[i], t[i]]);
  }
  function y(e, t) {
    return e && t && e.index == t.index && e.content == t.content;
  }
  function b(e, t) {
    const n = w(e);
    return Array.from(
      n.reduce((e, n) => (E(n, t).forEach((t) => e.add(t)), e), new Set())
    );
  }
  function _(e, t) {
    return w(e).reduce((e, n) => (e.push(...x(n, t)), e), []);
  }
  function w(e) {
    const t = [];
    for (; e; ) t.push(e), (e = Object.getPrototypeOf(e));
    return t.reverse();
  }
  function E(e, t) {
    const n = e[t];
    return Array.isArray(n) ? n : [];
  }
  function x(e, t) {
    const n = e[t];
    return n ? Object.keys(n).map((e) => [e, n[e]]) : [];
  }
  function T(e) {
    return C(e, A(e));
  }
  function C(e, t) {
    const n = Ge(e),
      i = k(e.prototype, t);
    return Object.defineProperties(n.prototype, i), n;
  }
  function A(e) {
    return b(e, "blessings").reduce((t, n) => {
      const i = n(e);
      for (const e in i) {
        const n = t[e] || {};
        t[e] = Object.assign(n, i[e]);
      }
      return t;
    }, {});
  }
  function k(e, t) {
    return Ye(t).reduce((n, i) => {
      const r = S(e, t, i);
      return r && Object.assign(n, { [i]: r }), n;
    }, {});
  }
  function S(e, t, n) {
    const i = Object.getOwnPropertyDescriptor(e, n);
    if (!(i && "value" in i)) {
      const e = Object.getOwnPropertyDescriptor(t, n).value;
      return i && ((e.get = i.get || e.get), (e.set = i.set || e.set)), e;
    }
  }
  function N(e) {
    return {
      identifier: e.identifier,
      controllerConstructor: T(e.controllerConstructor),
    };
  }
  function O(e, t) {
    return `[${e}~="${t}"]`;
  }
  function D() {
    return new Promise((e) => {
      "loading" == document.readyState
        ? document.addEventListener("DOMContentLoaded", () => e())
        : e();
    });
  }
  function j(e) {
    return b(e, "classes").reduce((e, t) => Object.assign(e, L(t)), {});
  }
  function L(e) {
    return {
      [`${e}Class`]: {
        get() {
          const { classes: t } = this;
          if (t.has(e)) return t.get(e);
          {
            const n = t.getAttributeName(e);
            throw new Error(`Missing attribute "${n}"`);
          }
        },
      },
      [`${e}Classes`]: {
        get() {
          return this.classes.getAll(e);
        },
      },
      [`has${s(e)}Class`]: {
        get() {
          return this.classes.has(e);
        },
      },
    };
  }
  function I(e) {
    return b(e, "targets").reduce((e, t) => Object.assign(e, M(t)), {});
  }
  function M(e) {
    return {
      [`${e}Target`]: {
        get() {
          const t = this.targets.find(e);
          if (t) return t;
          throw new Error(
            `Missing target element "${e}" for "${this.identifier}" controller`
          );
        },
      },
      [`${e}Targets`]: {
        get() {
          return this.targets.findAll(e);
        },
      },
      [`has${s(e)}Target`]: {
        get() {
          return this.targets.has(e);
        },
      },
    };
  }
  function F(e) {
    const t = _(e, "values"),
      n = {
        valueDescriptorMap: {
          get() {
            return t.reduce((e, t) => {
              const n = P(t),
                i = this.data.getAttributeNameForKey(n.key);
              return Object.assign(e, { [i]: n });
            }, {});
          },
        },
      };
    return t.reduce((e, t) => Object.assign(e, q(t)), n);
  }
  function q(e) {
    const t = P(e),
      { key: n, name: i, reader: r, writer: o } = t;
    return {
      [i]: {
        get() {
          const e = this.data.get(n);
          return null !== e ? r(e) : t.defaultValue;
        },
        set(e) {
          void 0 === e ? this.data.delete(n) : this.data.set(n, o(e));
        },
      },
      [`has${s(i)}`]: {
        get() {
          return this.data.has(n) || t.hasCustomDefaultValue;
        },
      },
    };
  }
  function P([e, t]) {
    return U(e, t);
  }
  function R(e) {
    switch (e) {
      case Array:
        return "array";
      case Boolean:
        return "boolean";
      case Number:
        return "number";
      case Object:
        return "object";
      case String:
        return "string";
    }
  }
  function B(e) {
    switch (typeof e) {
      case "boolean":
        return "boolean";
      case "number":
        return "number";
      case "string":
        return "string";
    }
    return Array.isArray(e)
      ? "array"
      : "[object Object]" === Object.prototype.toString.call(e)
      ? "object"
      : void 0;
  }
  function H(e) {
    const t = R(e.type);
    if (t) {
      const n = B(e.default);
      if (t !== n)
        throw new Error(
          `Type "${t}" must match the type of the default value. Given default value: "${e.default}" as "${n}"`
        );
      return t;
    }
  }
  function W(e) {
    const t = H(e),
      n = B(e),
      i = R(e),
      r = t || n || i;
    if (r) return r;
    throw new Error(`Unknown value type "${e}"`);
  }
  function V(e) {
    const t = R(e);
    if (t) return lt[t];
    const n = e.default;
    return void 0 !== n ? n : e;
  }
  function U(e, t) {
    const n = `${a(e)}-value`,
      i = W(t);
    return {
      type: i,
      key: n,
      name: o(n),
      get defaultValue() {
        return V(t);
      },
      get hasCustomDefaultValue() {
        return void 0 !== B(t);
      },
      reader: ut[i],
      writer: ct[i] || ct.default,
    };
  }
  function z(e) {
    return JSON.stringify(e);
  }
  function K(e) {
    return `${e}`;
  }
  function Q() {
    $.validator.addMethod(
      "phoneNumber",
      function (e, t) {
        const n = /(09|02|03|07|08|05)+([0-9 -()+])+$/;
        return (
          this.optional(t) || (e.length >= 10 && e.length <= 12 && n.test(e))
        );
      },
      "Please specify the correct phone number"
    );
  }
  function X(e) {
    return e.toLocaleString("vi-VN") + "\u0111";
  }
  function Y(e) {
    ie(ve(e));
  }
  function G(e) {
    const t = $(e.target).data("cart-item-id");
    t && oe(t);
  }
  function J(e) {
    const t = $(e.target).data("cart-item-id"),
      n = parseInt($(e.target).val());
    n > 0 ? re(t, { quantity: n }) : oe(t);
  }
  function Z(e) {
    const t = $(e.target.closest(".cart-item-row")),
      n = parseFloat(t.data("total-price"));
    fe(e.target.checked ? n : -n);
  }
  function ee(e) {
    e.target.checked ? fe(null, pe()) : fe(null, 0);
  }
  function te(e) {
    const t = parseInt($(e.target).val());
    $(".product-form .add-to-cart").data("quantity", t);
  }
  function ne() {
    const e = me();
    0 != e.length
      ? se({ cart_items: e })
      : alert("Vui l\xf2ng ch\u1ecdn s\u1ea3n ph\u1ea9m");
  }
  function ie(e) {
    $.ajax({
      type: "POST",
      data: ge(e),
      url: "/cart_items",
      success: () => {
        le();
      },
      error: () => {
        alert("Error, please try again!");
      },
    });
  }
  function re(e, t) {
    $.ajax({
      type: "PUT",
      data: ge(t),
      url: `/cart_items/${e}`,
      success: (t) => {
        ce(e, t.quantity);
      },
      error: () => {
        alert("Error, please try again!");
      },
    });
  }
  function oe(e) {
    $.ajax({
      type: "DELETE",
      data: ge({}),
      url: `/cart_items/${e}`,
      success: (e) => {
        ue(e);
      },
      error: () => {
        alert("Error, please try again!");
      },
    });
  }
  function se(e) {
    e.draft = !0;
  }
  function ae() {
    window.location = $(".submit-cart").attr("target");
  }
  function le() {
    de(1);
  }
  function ue(e) {
    de(-1),
      fe(-parseFloat(e.total_price)),
      $(`.cart-item-row-${e.id}`).remove();
  }
  function ce(e, t) {
    const n = $(`.cart-item-row-${e}`),
      i = parseFloat(n.data("price")),
      r = i * t,
      o = parseInt(n.data("quantity"));
    n.data("total-price", r),
      n.data("quantity", t),
      n.find(".cart-item-total-price").text(X(r)),
      fe((t - o) * i);
  }
  function de(e) {
    const t = ($(".cart-count").data("count") || 0) + e;
    $(".cart-count").data("count", t).text(t).removeClass("d-none");
  }
  function fe(e, t) {
    if (null != e) {
      t = parseFloat($(".cart-sub-total").data("amount") || 0) + e;
    }
    $(".cart-sub-total").data("amount", t).text(X(t));
  }
  function he() {
    return "none" != $(".desktopBlock").css("display")
      ? ".desktopBlock"
      : ".mobileBlock";
  }
  function pe() {
    return $(he())
      .find(".cart-item-row")
      .map((e, t) =>
        $(t).find(".cart-item-checkbox")[0].checked
          ? parseFloat($(t).data("total-price") || 0)
          : 0
      )
      .toArray()
      .reduce((e, t) => e + t, 0);
  }
  function me() {
    return $(he())
      .find(".cart-item-row")
      .map((e, t) =>
        $(t).find(".cart-item-checkbox")[0].checked
          ? { id: $(t).data("id") }
          : null
      )
      .toArray()
      .filter((e) => !!e);
  }
  function ge(e) {
    const t = $('meta[name="csrf-param"]').attr("content"),
      n = $('meta[name="csrf-token"]').attr("content");
    return (e[t] = n), e;
  }
  function ve(e) {
    return {
      product_id: $(e.currentTarget).data("product-id"),
      quantity: $(e.currentTarget).data("quantity") || 1,
      variant_id: $(e.currentTarget).data("variant-id"),
    };
  }
  function ye(e) {
    e.preventDefault();
    const t = $(e.target);
    t.valid() ? t.trigger("onValid") : t.trigger("onInvalid");
  }
  function be(e) {
    e.preventDefault();
    const t = $(e.target);
    t.valid() ? t.trigger("onValid") : t.trigger("onInvalid");
  }
  function _e(e, t) {
    const n = $(e).find(".wk-comments-body"),
      i = $(n).data("owner-id"),
      r = $(n).data("owner-type"),
      o = $(n).data("url");
    $.ajax({
      url: o,
      type: "GET",
      data: { owner_id: i, owner_type: r, page: t },
      success: function (t) {
        $(n).append(t.html),
          t.load_more
            ? ($(e).find(".load-more-comments").removeClass("d-none"),
              $(e).find(".load-more-comments").attr("data-page", `${t.page}`))
            : $(e).find(".load-more-comments").addClass("d-none");
      },
      error: function (e) {
        console.log(e);
      },
    });
  }
  var we = Object.create,
    Ee = Object.defineProperty,
    xe = Object.getOwnPropertyDescriptor,
    Te = Object.getOwnPropertyNames,
    Ce = Object.getPrototypeOf,
    Ae = Object.prototype.hasOwnProperty,
    ke = (e, t) =>
      function () {
        return (
          t || (0, e[Te(e)[0]])((t = { exports: {} }).exports, t), t.exports
        );
      },
    Se = (e, t, n, i) => {
      if ((t && "object" == typeof t) || "function" == typeof t)
        for (let r of Te(t))
          Ae.call(e, r) ||
            r === n ||
            Ee(e, r, {
              get: () => t[r],
              enumerable: !(i = xe(t, r)) || i.enumerable,
            });
      return e;
    },
    Ne = (e, t, n) => (
      (n = null != e ? we(Ce(e)) : {}),
      Se(
        !t && e && e.__esModule
          ? n
          : Ee(n, "default", { value: e, enumerable: !0 }),
        e
      )
    ),
    Oe = ke({
      "node_modules/jquery/dist/jquery.js"(e, t) {
        !(function (e, n) {
          "use strict";
          "object" == typeof t && "object" == typeof t.exports
            ? (t.exports = e.document
                ? n(e, !0)
                : function (e) {
                    if (!e.document)
                      throw new Error(
                        "jQuery requires a window with a document"
                      );
                    return n(e);
                  })
            : n(e);
        })("undefined" != typeof window ? window : e, function (e, t) {
          "use strict";
          function n(e, t, n) {
            var i,
              r,
              o = (n = n || we).createElement("script");
            if (((o.text = e), t))
              for (i in Ee)
                (r = t[i] || (t.getAttribute && t.getAttribute(i))) &&
                  o.setAttribute(i, r);
            n.head.appendChild(o).parentNode.removeChild(o);
          }
          function i(e) {
            return null == e
              ? e + ""
              : "object" == typeof e || "function" == typeof e
              ? he[pe.call(e)] || "object"
              : typeof e;
          }
          function r(e) {
            var t = !!e && "length" in e && e.length,
              n = i(e);
            return (
              !be(e) &&
              !_e(e) &&
              ("array" === n ||
                0 === t ||
                ("number" == typeof t && t > 0 && t - 1 in e))
            );
          }
          function o(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
          }
          function s(e, t, n) {
            return be(t)
              ? Te.grep(e, function (e, i) {
                  return !!t.call(e, i, e) !== n;
                })
              : t.nodeType
              ? Te.grep(e, function (e) {
                  return (e === t) !== n;
                })
              : "string" != typeof t
              ? Te.grep(e, function (e) {
                  return fe.call(t, e) > -1 !== n;
                })
              : Te.filter(t, e, n);
          }
          function a(e, t) {
            for (; (e = e[t]) && 1 !== e.nodeType; );
            return e;
          }
          function l(e) {
            var t = {};
            return (
              Te.each(e.match(Ie) || [], function (e, n) {
                t[n] = !0;
              }),
              t
            );
          }
          function u(e) {
            return e;
          }
          function c(e) {
            throw e;
          }
          function d(e, t, n, i) {
            var r;
            try {
              e && be((r = e.promise))
                ? r.call(e).done(t).fail(n)
                : e && be((r = e.then))
                ? r.call(e, t, n)
                : t.apply(void 0, [e].slice(i));
            } catch (e) {
              n.apply(void 0, [e]);
            }
          }
          function f() {
            we.removeEventListener("DOMContentLoaded", f),
              e.removeEventListener("load", f),
              Te.ready();
          }
          function h(e, t) {
            return t.toUpperCase();
          }
          function p(e) {
            return e.replace(Pe, "ms-").replace(Re, h);
          }
          function m() {
            this.expando = Te.expando + m.uid++;
          }
          function g(e) {
            return (
              "true" === e ||
              ("false" !== e &&
                ("null" === e
                  ? null
                  : e === +e + ""
                  ? +e
                  : We.test(e)
                  ? JSON.parse(e)
                  : e))
            );
          }
          function v(e, t, n) {
            var i;
            if (void 0 === n && 1 === e.nodeType)
              if (
                ((i = "data-" + t.replace(Ve, "-$&").toLowerCase()),
                "string" == typeof (n = e.getAttribute(i)))
              ) {
                try {
                  n = g(n);
                } catch (e) {}
                He.set(e, t, n);
              } else n = void 0;
            return n;
          }
          function y(e, t, n, i) {
            var r,
              o,
              s = 20,
              a = i
                ? function () {
                    return i.cur();
                  }
                : function () {
                    return Te.css(e, t, "");
                  },
              l = a(),
              u = (n && n[3]) || (Te.cssNumber[t] ? "" : "px"),
              c =
                e.nodeType &&
                (Te.cssNumber[t] || ("px" !== u && +l)) &&
                ze.exec(Te.css(e, t));
            if (c && c[3] !== u) {
              for (l /= 2, u = u || c[3], c = +l || 1; s--; )
                Te.style(e, t, c + u),
                  (1 - o) * (1 - (o = a() / l || 0.5)) <= 0 && (s = 0),
                  (c /= o);
              (c *= 2), Te.style(e, t, c + u), (n = n || []);
            }
            return (
              n &&
                ((c = +c || +l || 0),
                (r = n[1] ? c + (n[1] + 1) * n[2] : +n[2]),
                i && ((i.unit = u), (i.start = c), (i.end = r))),
              r
            );
          }
          function b(e) {
            var t,
              n = e.ownerDocument,
              i = e.nodeName,
              r = Je[i];
            return (
              r ||
              ((t = n.body.appendChild(n.createElement(i))),
              (r = Te.css(t, "display")),
              t.parentNode.removeChild(t),
              "none" === r && (r = "block"),
              (Je[i] = r),
              r)
            );
          }
          function _(e, t) {
            for (var n, i, r = [], o = 0, s = e.length; o < s; o++)
              (i = e[o]).style &&
                ((n = i.style.display),
                t
                  ? ("none" === n &&
                      ((r[o] = $e.get(i, "display") || null),
                      r[o] || (i.style.display = "")),
                    "" === i.style.display && Ge(i) && (r[o] = b(i)))
                  : "none" !== n && ((r[o] = "none"), $e.set(i, "display", n)));
            for (o = 0; o < s; o++) null != r[o] && (e[o].style.display = r[o]);
            return e;
          }
          function w(e, t) {
            var n;
            return (
              (n =
                void 0 !== e.getElementsByTagName
                  ? e.getElementsByTagName(t || "*")
                  : void 0 !== e.querySelectorAll
                  ? e.querySelectorAll(t || "*")
                  : []),
              void 0 === t || (t && o(e, t)) ? Te.merge([e], n) : n
            );
          }
          function E(e, t) {
            for (var n = 0, i = e.length; n < i; n++)
              $e.set(e[n], "globalEval", !t || $e.get(t[n], "globalEval"));
          }
          function x(e, t, n, r, o) {
            for (
              var s,
                a,
                l,
                u,
                c,
                d,
                f = t.createDocumentFragment(),
                h = [],
                p = 0,
                m = e.length;
              p < m;
              p++
            )
              if ((s = e[p]) || 0 === s)
                if ("object" === i(s)) Te.merge(h, s.nodeType ? [s] : s);
                else if (ot.test(s)) {
                  for (
                    a = a || f.appendChild(t.createElement("div")),
                      l = (nt.exec(s) || ["", ""])[1].toLowerCase(),
                      u = rt[l] || rt._default,
                      a.innerHTML = u[1] + Te.htmlPrefilter(s) + u[2],
                      d = u[0];
                    d--;

                  )
                    a = a.lastChild;
                  Te.merge(h, a.childNodes),
                    ((a = f.firstChild).textContent = "");
                } else h.push(t.createTextNode(s));
            for (f.textContent = "", p = 0; (s = h[p++]); )
              if (r && Te.inArray(s, r) > -1) o && o.push(s);
              else if (
                ((c = Xe(s)), (a = w(f.appendChild(s), "script")), c && E(a), n)
              )
                for (d = 0; (s = a[d++]); ) it.test(s.type || "") && n.push(s);
            return f;
          }
          function T() {
            return !0;
          }
          function C() {
            return !1;
          }
          function A(e, t) {
            return (e === k()) == ("focus" === t);
          }
          function k() {
            try {
              return we.activeElement;
            } catch (e) {}
          }
          function S(e, t, n, i, r, o) {
            var s, a;
            if ("object" == typeof t) {
              for (a in ("string" != typeof n && ((i = i || n), (n = void 0)),
              t))
                S(e, a, n, i, t[a], o);
              return e;
            }
            if (
              (null == i && null == r
                ? ((r = n), (i = n = void 0))
                : null == r &&
                  ("string" == typeof n
                    ? ((r = i), (i = void 0))
                    : ((r = i), (i = n), (n = void 0))),
              !1 === r)
            )
              r = C;
            else if (!r) return e;
            return (
              1 === o &&
                ((s = r),
                (r = function (e) {
                  return Te().off(e), s.apply(this, arguments);
                }),
                (r.guid = s.guid || (s.guid = Te.guid++))),
              e.each(function () {
                Te.event.add(this, t, r, i, n);
              })
            );
          }
          function N(e, t, n) {
            n
              ? ($e.set(e, t, !1),
                Te.event.add(e, t, {
                  namespace: !1,
                  handler: function (e) {
                    var i,
                      r,
                      o = $e.get(this, t);
                    if (1 & e.isTrigger && this[t]) {
                      if (o.length)
                        (Te.event.special[t] || {}).delegateType &&
                          e.stopPropagation();
                      else if (
                        ((o = ue.call(arguments)),
                        $e.set(this, t, o),
                        (i = n(this, t)),
                        this[t](),
                        o !== (r = $e.get(this, t)) || i
                          ? $e.set(this, t, !1)
                          : (r = {}),
                        o !== r)
                      )
                        return (
                          e.stopImmediatePropagation(),
                          e.preventDefault(),
                          r && r.value
                        );
                    } else
                      o.length &&
                        ($e.set(this, t, {
                          value: Te.event.trigger(
                            Te.extend(o[0], Te.Event.prototype),
                            o.slice(1),
                            this
                          ),
                        }),
                        e.stopImmediatePropagation());
                  },
                }))
              : void 0 === $e.get(e, t) && Te.event.add(e, t, T);
          }
          function O(e, t) {
            return (
              (o(e, "table") &&
                o(11 !== t.nodeType ? t : t.firstChild, "tr") &&
                Te(e).children("tbody")[0]) ||
              e
            );
          }
          function D(e) {
            return (
              (e.type = (null !== e.getAttribute("type")) + "/" + e.type), e
            );
          }
          function j(e) {
            return (
              "true/" === (e.type || "").slice(0, 5)
                ? (e.type = e.type.slice(5))
                : e.removeAttribute("type"),
              e
            );
          }
          function L(e, t) {
            var n, i, r, o, s, a;
            if (1 === t.nodeType) {
              if ($e.hasData(e) && (a = $e.get(e).events))
                for (r in ($e.remove(t, "handle events"), a))
                  for (n = 0, i = a[r].length; n < i; n++)
                    Te.event.add(t, r, a[r][n]);
              He.hasData(e) &&
                ((o = He.access(e)), (s = Te.extend({}, o)), He.set(t, s));
            }
          }
          function I(e, t) {
            var n = t.nodeName.toLowerCase();
            "input" === n && tt.test(e.type)
              ? (t.checked = e.checked)
              : ("input" !== n && "textarea" !== n) ||
                (t.defaultValue = e.defaultValue);
          }
          function M(e, t, i, r) {
            t = ce(t);
            var o,
              s,
              a,
              l,
              u,
              c,
              d = 0,
              f = e.length,
              h = f - 1,
              p = t[0],
              m = be(p);
            if (
              m ||
              (f > 1 && "string" == typeof p && !ye.checkClone && lt.test(p))
            )
              return e.each(function (n) {
                var o = e.eq(n);
                m && (t[0] = p.call(this, n, o.html())), M(o, t, i, r);
              });
            if (
              f &&
              ((s = (o = x(t, e[0].ownerDocument, !1, e, r)).firstChild),
              1 === o.childNodes.length && (o = s),
              s || r)
            ) {
              for (l = (a = Te.map(w(o, "script"), D)).length; d < f; d++)
                (u = o),
                  d !== h &&
                    ((u = Te.clone(u, !0, !0)),
                    l && Te.merge(a, w(u, "script"))),
                  i.call(e[d], u, d);
              if (l)
                for (
                  c = a[a.length - 1].ownerDocument, Te.map(a, j), d = 0;
                  d < l;
                  d++
                )
                  (u = a[d]),
                    it.test(u.type || "") &&
                      !$e.access(u, "globalEval") &&
                      Te.contains(c, u) &&
                      (u.src && "module" !== (u.type || "").toLowerCase()
                        ? Te._evalUrl &&
                          !u.noModule &&
                          Te._evalUrl(
                            u.src,
                            { nonce: u.nonce || u.getAttribute("nonce") },
                            c
                          )
                        : n(u.textContent.replace(ut, ""), u, c));
            }
            return e;
          }
          function F(e, t, n) {
            for (
              var i, r = t ? Te.filter(t, e) : e, o = 0;
              null != (i = r[o]);
              o++
            )
              n || 1 !== i.nodeType || Te.cleanData(w(i)),
                i.parentNode &&
                  (n && Xe(i) && E(w(i, "script")),
                  i.parentNode.removeChild(i));
            return e;
          }
          function q(e, t, n) {
            var i,
              r,
              o,
              s,
              a = e.style;
            return (
              (n = n || dt(e)) &&
                ("" !== (s = n.getPropertyValue(t) || n[t]) ||
                  Xe(e) ||
                  (s = Te.style(e, t)),
                !ye.pixelBoxStyles() &&
                  ct.test(s) &&
                  ht.test(t) &&
                  ((i = a.width),
                  (r = a.minWidth),
                  (o = a.maxWidth),
                  (a.minWidth = a.maxWidth = a.width = s),
                  (s = n.width),
                  (a.width = i),
                  (a.minWidth = r),
                  (a.maxWidth = o))),
              void 0 !== s ? s + "" : s
            );
          }
          function P(e, t) {
            return {
              get: function () {
                if (!e()) return (this.get = t).apply(this, arguments);
                delete this.get;
              },
            };
          }
          function R(e) {
            for (var t = e[0].toUpperCase() + e.slice(1), n = pt.length; n--; )
              if ((e = pt[n] + t) in mt) return e;
          }
          function B(e) {
            var t = Te.cssProps[e] || gt[e];
            return t || (e in mt ? e : (gt[e] = R(e) || e));
          }
          function $(e, t, n) {
            var i = ze.exec(t);
            return i ? Math.max(0, i[2] - (n || 0)) + (i[3] || "px") : t;
          }
          function H(e, t, n, i, r, o) {
            var s = "width" === t ? 1 : 0,
              a = 0,
              l = 0;
            if (n === (i ? "border" : "content")) return 0;
            for (; s < 4; s += 2)
              "margin" === n && (l += Te.css(e, n + Ke[s], !0, r)),
                i
                  ? ("content" === n &&
                      (l -= Te.css(e, "padding" + Ke[s], !0, r)),
                    "margin" !== n &&
                      (l -= Te.css(e, "border" + Ke[s] + "Width", !0, r)))
                  : ((l += Te.css(e, "padding" + Ke[s], !0, r)),
                    "padding" !== n
                      ? (l += Te.css(e, "border" + Ke[s] + "Width", !0, r))
                      : (a += Te.css(e, "border" + Ke[s] + "Width", !0, r)));
            return (
              !i &&
                o >= 0 &&
                (l +=
                  Math.max(
                    0,
                    Math.ceil(
                      e["offset" + t[0].toUpperCase() + t.slice(1)] -
                        o -
                        l -
                        a -
                        0.5
                    )
                  ) || 0),
              l
            );
          }
          function W(e, t, n) {
            var i = dt(e),
              r =
                (!ye.boxSizingReliable() || n) &&
                "border-box" === Te.css(e, "boxSizing", !1, i),
              s = r,
              a = q(e, t, i),
              l = "offset" + t[0].toUpperCase() + t.slice(1);
            if (ct.test(a)) {
              if (!n) return a;
              a = "auto";
            }
            return (
              ((!ye.boxSizingReliable() && r) ||
                (!ye.reliableTrDimensions() && o(e, "tr")) ||
                "auto" === a ||
                (!parseFloat(a) && "inline" === Te.css(e, "display", !1, i))) &&
                e.getClientRects().length &&
                ((r = "border-box" === Te.css(e, "boxSizing", !1, i)),
                (s = l in e) && (a = e[l])),
              (a = parseFloat(a) || 0) +
                H(e, t, n || (r ? "border" : "content"), s, i, a) +
                "px"
            );
          }
          function V(e, t, n, i, r) {
            return new V.prototype.init(e, t, n, i, r);
          }
          function U() {
            Et &&
              (!1 === we.hidden && e.requestAnimationFrame
                ? e.requestAnimationFrame(U)
                : e.setTimeout(U, Te.fx.interval),
              Te.fx.tick());
          }
          function z() {
            return (
              e.setTimeout(function () {
                wt = void 0;
              }),
              (wt = Date.now())
            );
          }
          function K(e, t) {
            var n,
              i = 0,
              r = { height: e };
            for (t = t ? 1 : 0; i < 4; i += 2 - t)
              r["margin" + (n = Ke[i])] = r["padding" + n] = e;
            return t && (r.opacity = r.width = e), r;
          }
          function Q(e, t, n) {
            for (
              var i,
                r = (G.tweeners[t] || []).concat(G.tweeners["*"]),
                o = 0,
                s = r.length;
              o < s;
              o++
            )
              if ((i = r[o].call(n, t, e))) return i;
          }
          function X(e, t, n) {
            var i,
              r,
              o,
              s,
              a,
              l,
              u,
              c,
              d = "width" in t || "height" in t,
              f = this,
              h = {},
              p = e.style,
              m = e.nodeType && Ge(e),
              g = $e.get(e, "fxshow");
            for (i in (n.queue ||
              (null == (s = Te._queueHooks(e, "fx")).unqueued &&
                ((s.unqueued = 0),
                (a = s.empty.fire),
                (s.empty.fire = function () {
                  s.unqueued || a();
                })),
              s.unqueued++,
              f.always(function () {
                f.always(function () {
                  s.unqueued--, Te.queue(e, "fx").length || s.empty.fire();
                });
              })),
            t))
              if (((r = t[i]), xt.test(r))) {
                if (
                  (delete t[i],
                  (o = o || "toggle" === r),
                  r === (m ? "hide" : "show"))
                ) {
                  if ("show" !== r || !g || void 0 === g[i]) continue;
                  m = !0;
                }
                h[i] = (g && g[i]) || Te.style(e, i);
              }
            if ((l = !Te.isEmptyObject(t)) || !Te.isEmptyObject(h))
              for (i in (d &&
                1 === e.nodeType &&
                ((n.overflow = [p.overflow, p.overflowX, p.overflowY]),
                null == (u = g && g.display) && (u = $e.get(e, "display")),
                "none" === (c = Te.css(e, "display")) &&
                  (u
                    ? (c = u)
                    : (_([e], !0),
                      (u = e.style.display || u),
                      (c = Te.css(e, "display")),
                      _([e]))),
                ("inline" === c || ("inline-block" === c && null != u)) &&
                  "none" === Te.css(e, "float") &&
                  (l ||
                    (f.done(function () {
                      p.display = u;
                    }),
                    null == u &&
                      ((c = p.display), (u = "none" === c ? "" : c))),
                  (p.display = "inline-block"))),
              n.overflow &&
                ((p.overflow = "hidden"),
                f.always(function () {
                  (p.overflow = n.overflow[0]),
                    (p.overflowX = n.overflow[1]),
                    (p.overflowY = n.overflow[2]);
                })),
              (l = !1),
              h))
                l ||
                  (g
                    ? "hidden" in g && (m = g.hidden)
                    : (g = $e.access(e, "fxshow", { display: u })),
                  o && (g.hidden = !m),
                  m && _([e], !0),
                  f.done(function () {
                    for (i in (m || _([e]), $e.remove(e, "fxshow"), h))
                      Te.style(e, i, h[i]);
                  })),
                  (l = Q(m ? g[i] : 0, i, f)),
                  i in g ||
                    ((g[i] = l.start), m && ((l.end = l.start), (l.start = 0)));
          }
          function Y(e, t) {
            var n, i, r, o, s;
            for (n in e)
              if (
                ((r = t[(i = p(n))]),
                (o = e[n]),
                Array.isArray(o) && ((r = o[1]), (o = e[n] = o[0])),
                n !== i && ((e[i] = o), delete e[n]),
                (s = Te.cssHooks[i]) && "expand" in s)
              )
                for (n in ((o = s.expand(o)), delete e[i], o))
                  n in e || ((e[n] = o[n]), (t[n] = r));
              else t[i] = r;
          }
          function G(e, t, n) {
            var i,
              r,
              o = 0,
              s = G.prefilters.length,
              a = Te.Deferred().always(function () {
                delete l.elem;
              }),
              l = function () {
                if (r) return !1;
                for (
                  var t = wt || z(),
                    n = Math.max(0, u.startTime + u.duration - t),
                    i = 1 - (n / u.duration || 0),
                    o = 0,
                    s = u.tweens.length;
                  o < s;
                  o++
                )
                  u.tweens[o].run(i);
                return (
                  a.notifyWith(e, [u, i, n]),
                  i < 1 && s
                    ? n
                    : (s || a.notifyWith(e, [u, 1, 0]),
                      a.resolveWith(e, [u]),
                      !1)
                );
              },
              u = a.promise({
                elem: e,
                props: Te.extend({}, t),
                opts: Te.extend(
                  !0,
                  { specialEasing: {}, easing: Te.easing._default },
                  n
                ),
                originalProperties: t,
                originalOptions: n,
                startTime: wt || z(),
                duration: n.duration,
                tweens: [],
                createTween: function (t, n) {
                  var i = Te.Tween(
                    e,
                    u.opts,
                    t,
                    n,
                    u.opts.specialEasing[t] || u.opts.easing
                  );
                  return u.tweens.push(i), i;
                },
                stop: function (t) {
                  var n = 0,
                    i = t ? u.tweens.length : 0;
                  if (r) return this;
                  for (r = !0; n < i; n++) u.tweens[n].run(1);
                  return (
                    t
                      ? (a.notifyWith(e, [u, 1, 0]), a.resolveWith(e, [u, t]))
                      : a.rejectWith(e, [u, t]),
                    this
                  );
                },
              }),
              c = u.props;
            for (Y(c, u.opts.specialEasing); o < s; o++)
              if ((i = G.prefilters[o].call(u, e, c, u.opts)))
                return (
                  be(i.stop) &&
                    (Te._queueHooks(u.elem, u.opts.queue).stop =
                      i.stop.bind(i)),
                  i
                );
            return (
              Te.map(c, Q, u),
              be(u.opts.start) && u.opts.start.call(e, u),
              u
                .progress(u.opts.progress)
                .done(u.opts.done, u.opts.complete)
                .fail(u.opts.fail)
                .always(u.opts.always),
              Te.fx.timer(
                Te.extend(l, { elem: e, anim: u, queue: u.opts.queue })
              ),
              u
            );
          }
          function J(e) {
            return (e.match(Ie) || []).join(" ");
          }
          function Z(e) {
            return (e.getAttribute && e.getAttribute("class")) || "";
          }
          function ee(e) {
            return Array.isArray(e)
              ? e
              : ("string" == typeof e && e.match(Ie)) || [];
          }
          function te(e, t, n, r) {
            var o;
            if (Array.isArray(t))
              Te.each(t, function (t, i) {
                n || Mt.test(e)
                  ? r(e, i)
                  : te(
                      e +
                        "[" +
                        ("object" == typeof i && null != i ? t : "") +
                        "]",
                      i,
                      n,
                      r
                    );
              });
            else if (n || "object" !== i(t)) r(e, t);
            else for (o in t) te(e + "[" + o + "]", t[o], n, r);
          }
          function ne(e) {
            return function (t, n) {
              "string" != typeof t && ((n = t), (t = "*"));
              var i,
                r = 0,
                o = t.toLowerCase().match(Ie) || [];
              if (be(n))
                for (; (i = o[r++]); )
                  "+" === i[0]
                    ? ((i = i.slice(1) || "*"), (e[i] = e[i] || []).unshift(n))
                    : (e[i] = e[i] || []).push(n);
            };
          }
          function ie(e, t, n, i) {
            function r(a) {
              var l;
              return (
                (o[a] = !0),
                Te.each(e[a] || [], function (e, a) {
                  var u = a(t, n, i);
                  return "string" != typeof u || s || o[u]
                    ? s
                      ? !(l = u)
                      : void 0
                    : (t.dataTypes.unshift(u), r(u), !1);
                }),
                l
              );
            }
            var o = {},
              s = e === Kt;
            return r(t.dataTypes[0]) || (!o["*"] && r("*"));
          }
          function re(e, t) {
            var n,
              i,
              r = Te.ajaxSettings.flatOptions || {};
            for (n in t)
              void 0 !== t[n] && ((r[n] ? e : i || (i = {}))[n] = t[n]);
            return i && Te.extend(!0, e, i), e;
          }
          function oe(e, t, n) {
            for (
              var i, r, o, s, a = e.contents, l = e.dataTypes;
              "*" === l[0];

            )
              l.shift(),
                void 0 === i &&
                  (i = e.mimeType || t.getResponseHeader("Content-Type"));
            if (i)
              for (r in a)
                if (a[r] && a[r].test(i)) {
                  l.unshift(r);
                  break;
                }
            if (l[0] in n) o = l[0];
            else {
              for (r in n) {
                if (!l[0] || e.converters[r + " " + l[0]]) {
                  o = r;
                  break;
                }
                s || (s = r);
              }
              o = o || s;
            }
            if (o) return o !== l[0] && l.unshift(o), n[o];
          }
          function se(e, t, n, i) {
            var r,
              o,
              s,
              a,
              l,
              u = {},
              c = e.dataTypes.slice();
            if (c[1])
              for (s in e.converters) u[s.toLowerCase()] = e.converters[s];
            for (o = c.shift(); o; )
              if (
                (e.responseFields[o] && (n[e.responseFields[o]] = t),
                !l && i && e.dataFilter && (t = e.dataFilter(t, e.dataType)),
                (l = o),
                (o = c.shift()))
              )
                if ("*" === o) o = l;
                else if ("*" !== l && l !== o) {
                  if (!(s = u[l + " " + o] || u["* " + o]))
                    for (r in u)
                      if (
                        (a = r.split(" "))[1] === o &&
                        (s = u[l + " " + a[0]] || u["* " + a[0]])
                      ) {
                        !0 === s
                          ? (s = u[r])
                          : !0 !== u[r] && ((o = a[0]), c.unshift(a[1]));
                        break;
                      }
                  if (!0 !== s)
                    if (s && e.throws) t = s(t);
                    else
                      try {
                        t = s(t);
                      } catch (e) {
                        return {
                          state: "parsererror",
                          error: s ? e : "No conversion from " + l + " to " + o,
                        };
                      }
                }
            return { state: "success", data: t };
          }
          var ae = [],
            le = Object.getPrototypeOf,
            ue = ae.slice,
            ce = ae.flat
              ? function (e) {
                  return ae.flat.call(e);
                }
              : function (e) {
                  return ae.concat.apply([], e);
                },
            de = ae.push,
            fe = ae.indexOf,
            he = {},
            pe = he.toString,
            me = he.hasOwnProperty,
            ge = me.toString,
            ve = ge.call(Object),
            ye = {},
            be = function (e) {
              return (
                "function" == typeof e &&
                "number" != typeof e.nodeType &&
                "function" != typeof e.item
              );
            },
            _e = function (e) {
              return null != e && e === e.window;
            },
            we = e.document,
            Ee = { type: !0, src: !0, nonce: !0, noModule: !0 },
            xe = "3.6.0",
            Te = function (e, t) {
              return new Te.fn.init(e, t);
            };
          (Te.fn = Te.prototype =
            {
              jquery: xe,
              constructor: Te,
              length: 0,
              toArray: function () {
                return ue.call(this);
              },
              get: function (e) {
                return null == e
                  ? ue.call(this)
                  : e < 0
                  ? this[e + this.length]
                  : this[e];
              },
              pushStack: function (e) {
                var t = Te.merge(this.constructor(), e);
                return (t.prevObject = this), t;
              },
              each: function (e) {
                return Te.each(this, e);
              },
              map: function (e) {
                return this.pushStack(
                  Te.map(this, function (t, n) {
                    return e.call(t, n, t);
                  })
                );
              },
              slice: function () {
                return this.pushStack(ue.apply(this, arguments));
              },
              first: function () {
                return this.eq(0);
              },
              last: function () {
                return this.eq(-1);
              },
              even: function () {
                return this.pushStack(
                  Te.grep(this, function (e, t) {
                    return (t + 1) % 2;
                  })
                );
              },
              odd: function () {
                return this.pushStack(
                  Te.grep(this, function (e, t) {
                    return t % 2;
                  })
                );
              },
              eq: function (e) {
                var t = this.length,
                  n = +e + (e < 0 ? t : 0);
                return this.pushStack(n >= 0 && n < t ? [this[n]] : []);
              },
              end: function () {
                return this.prevObject || this.constructor();
              },
              push: de,
              sort: ae.sort,
              splice: ae.splice,
            }),
            (Te.extend = Te.fn.extend =
              function () {
                var e,
                  t,
                  n,
                  i,
                  r,
                  o,
                  s = arguments[0] || {},
                  a = 1,
                  l = arguments.length,
                  u = !1;
                for (
                  "boolean" == typeof s &&
                    ((u = s), (s = arguments[a] || {}), a++),
                    "object" == typeof s || be(s) || (s = {}),
                    a === l && ((s = this), a--);
                  a < l;
                  a++
                )
                  if (null != (e = arguments[a]))
                    for (t in e)
                      (i = e[t]),
                        "__proto__" !== t &&
                          s !== i &&
                          (u &&
                          i &&
                          (Te.isPlainObject(i) || (r = Array.isArray(i)))
                            ? ((n = s[t]),
                              (o =
                                r && !Array.isArray(n)
                                  ? []
                                  : r || Te.isPlainObject(n)
                                  ? n
                                  : {}),
                              (r = !1),
                              (s[t] = Te.extend(u, o, i)))
                            : void 0 !== i && (s[t] = i));
                return s;
              }),
            Te.extend({
              expando: "jQuery" + (xe + Math.random()).replace(/\D/g, ""),
              isReady: !0,
              error: function (e) {
                throw new Error(e);
              },
              noop: function () {},
              isPlainObject: function (e) {
                var t, n;
                return (
                  !(!e || "[object Object]" !== pe.call(e)) &&
                  (!(t = le(e)) ||
                    ("function" ==
                      typeof (n = me.call(t, "constructor") && t.constructor) &&
                      ge.call(n) === ve))
                );
              },
              isEmptyObject: function (e) {
                var t;
                for (t in e) return !1;
                return !0;
              },
              globalEval: function (e, t, i) {
                n(e, { nonce: t && t.nonce }, i);
              },
              each: function (e, t) {
                var n,
                  i = 0;
                if (r(e))
                  for (
                    n = e.length;
                    i < n && !1 !== t.call(e[i], i, e[i]);
                    i++
                  );
                else for (i in e) if (!1 === t.call(e[i], i, e[i])) break;
                return e;
              },
              makeArray: function (e, t) {
                var n = t || [];
                return (
                  null != e &&
                    (r(Object(e))
                      ? Te.merge(n, "string" == typeof e ? [e] : e)
                      : de.call(n, e)),
                  n
                );
              },
              inArray: function (e, t, n) {
                return null == t ? -1 : fe.call(t, e, n);
              },
              merge: function (e, t) {
                for (var n = +t.length, i = 0, r = e.length; i < n; i++)
                  e[r++] = t[i];
                return (e.length = r), e;
              },
              grep: function (e, t, n) {
                for (var i = [], r = 0, o = e.length, s = !n; r < o; r++)
                  !t(e[r], r) !== s && i.push(e[r]);
                return i;
              },
              map: function (e, t, n) {
                var i,
                  o,
                  s = 0,
                  a = [];
                if (r(e))
                  for (i = e.length; s < i; s++)
                    null != (o = t(e[s], s, n)) && a.push(o);
                else for (s in e) null != (o = t(e[s], s, n)) && a.push(o);
                return ce(a);
              },
              guid: 1,
              support: ye,
            }),
            "function" == typeof Symbol &&
              (Te.fn[Symbol.iterator] = ae[Symbol.iterator]),
            Te.each(
              "Boolean Number String Function Array Date RegExp Object Error Symbol".split(
                " "
              ),
              function (e, t) {
                he["[object " + t + "]"] = t.toLowerCase();
              }
            );
          var Ce = (function (e) {
            function t(e, t, n, i) {
              var r,
                o,
                s,
                a,
                l,
                u,
                c,
                f = t && t.ownerDocument,
                p = t ? t.nodeType : 9;
              if (
                ((n = n || []),
                "string" != typeof e || !e || (1 !== p && 9 !== p && 11 !== p))
              )
                return n;
              if (!i && (j(t), (t = t || L), M)) {
                if (11 !== p && (l = be.exec(e)))
                  if ((r = l[1])) {
                    if (9 === p) {
                      if (!(s = t.getElementById(r))) return n;
                      if (s.id === r) return n.push(s), n;
                    } else if (
                      f &&
                      (s = f.getElementById(r)) &&
                      R(t, s) &&
                      s.id === r
                    )
                      return n.push(s), n;
                  } else {
                    if (l[2]) return Z.apply(n, t.getElementsByTagName(e)), n;
                    if (
                      (r = l[3]) &&
                      E.getElementsByClassName &&
                      t.getElementsByClassName
                    )
                      return Z.apply(n, t.getElementsByClassName(r)), n;
                  }
                if (
                  E.qsa &&
                  !K[e + " "] &&
                  (!F || !F.test(e)) &&
                  (1 !== p || "object" !== t.nodeName.toLowerCase())
                ) {
                  if (
                    ((c = e), (f = t), 1 === p && (de.test(e) || ce.test(e)))
                  ) {
                    for (
                      ((f = (_e.test(e) && d(t.parentNode)) || t) === t &&
                        E.scope) ||
                        ((a = t.getAttribute("id"))
                          ? (a = a.replace(xe, Te))
                          : t.setAttribute("id", (a = B))),
                        o = (u = A(e)).length;
                      o--;

                    )
                      u[o] = (a ? "#" + a : ":scope") + " " + h(u[o]);
                    c = u.join(",");
                  }
                  try {
                    return Z.apply(n, f.querySelectorAll(c)), n;
                  } catch (t) {
                    K(e, !0);
                  } finally {
                    a === B && t.removeAttribute("id");
                  }
                }
              }
              return S(e.replace(le, "$1"), t, n, i);
            }
            function n() {
              function e(n, i) {
                return (
                  t.push(n + " ") > x.cacheLength && delete e[t.shift()],
                  (e[n + " "] = i)
                );
              }
              var t = [];
              return e;
            }
            function i(e) {
              return (e[B] = !0), e;
            }
            function r(e) {
              var t = L.createElement("fieldset");
              try {
                return !!e(t);
              } catch (e) {
                return !1;
              } finally {
                t.parentNode && t.parentNode.removeChild(t), (t = null);
              }
            }
            function o(e, t) {
              for (var n = e.split("|"), i = n.length; i--; )
                x.attrHandle[n[i]] = t;
            }
            function s(e, t) {
              var n = t && e,
                i =
                  n &&
                  1 === e.nodeType &&
                  1 === t.nodeType &&
                  e.sourceIndex - t.sourceIndex;
              if (i) return i;
              if (n) for (; (n = n.nextSibling); ) if (n === t) return -1;
              return e ? 1 : -1;
            }
            function a(e) {
              return function (t) {
                return "input" === t.nodeName.toLowerCase() && t.type === e;
              };
            }
            function l(e) {
              return function (t) {
                var n = t.nodeName.toLowerCase();
                return ("input" === n || "button" === n) && t.type === e;
              };
            }
            function u(e) {
              return function (t) {
                return "form" in t
                  ? t.parentNode && !1 === t.disabled
                    ? "label" in t
                      ? "label" in t.parentNode
                        ? t.parentNode.disabled === e
                        : t.disabled === e
                      : t.isDisabled === e ||
                        (t.isDisabled !== !e && Ae(t) === e)
                    : t.disabled === e
                  : "label" in t && t.disabled === e;
              };
            }
            function c(e) {
              return i(function (t) {
                return (
                  (t = +t),
                  i(function (n, i) {
                    for (var r, o = e([], n.length, t), s = o.length; s--; )
                      n[(r = o[s])] && (n[r] = !(i[r] = n[r]));
                  })
                );
              });
            }
            function d(e) {
              return e && void 0 !== e.getElementsByTagName && e;
            }
            function f() {}
            function h(e) {
              for (var t = 0, n = e.length, i = ""; t < n; t++) i += e[t].value;
              return i;
            }
            function p(e, t, n) {
              var i = t.dir,
                r = t.next,
                o = r || i,
                s = n && "parentNode" === o,
                a = W++;
              return t.first
                ? function (t, n, r) {
                    for (; (t = t[i]); )
                      if (1 === t.nodeType || s) return e(t, n, r);
                    return !1;
                  }
                : function (t, n, l) {
                    var u,
                      c,
                      d,
                      f = [H, a];
                    if (l) {
                      for (; (t = t[i]); )
                        if ((1 === t.nodeType || s) && e(t, n, l)) return !0;
                    } else
                      for (; (t = t[i]); )
                        if (1 === t.nodeType || s)
                          if (
                            ((c =
                              (d = t[B] || (t[B] = {}))[t.uniqueID] ||
                              (d[t.uniqueID] = {})),
                            r && r === t.nodeName.toLowerCase())
                          )
                            t = t[i] || t;
                          else {
                            if ((u = c[o]) && u[0] === H && u[1] === a)
                              return (f[2] = u[2]);
                            if (((c[o] = f), (f[2] = e(t, n, l)))) return !0;
                          }
                    return !1;
                  };
            }
            function m(e) {
              return e.length > 1
                ? function (t, n, i) {
                    for (var r = e.length; r--; ) if (!e[r](t, n, i)) return !1;
                    return !0;
                  }
                : e[0];
            }
            function g(e, n, i) {
              for (var r = 0, o = n.length; r < o; r++) t(e, n[r], i);
              return i;
            }
            function v(e, t, n, i, r) {
              for (
                var o, s = [], a = 0, l = e.length, u = null != t;
                a < l;
                a++
              )
                (o = e[a]) &&
                  ((n && !n(o, i, r)) || (s.push(o), u && t.push(a)));
              return s;
            }
            function y(e, t, n, r, o, s) {
              return (
                r && !r[B] && (r = y(r)),
                o && !o[B] && (o = y(o, s)),
                i(function (i, s, a, l) {
                  var u,
                    c,
                    d,
                    f = [],
                    h = [],
                    p = s.length,
                    m = i || g(t || "*", a.nodeType ? [a] : a, []),
                    y = !e || (!i && t) ? m : v(m, f, e, a, l),
                    b = n ? (o || (i ? e : p || r) ? [] : s) : y;
                  if ((n && n(y, b, a, l), r))
                    for (u = v(b, h), r(u, [], a, l), c = u.length; c--; )
                      (d = u[c]) && (b[h[c]] = !(y[h[c]] = d));
                  if (i) {
                    if (o || e) {
                      if (o) {
                        for (u = [], c = b.length; c--; )
                          (d = b[c]) && u.push((y[c] = d));
                        o(null, (b = []), u, l);
                      }
                      for (c = b.length; c--; )
                        (d = b[c]) &&
                          (u = o ? te(i, d) : f[c]) > -1 &&
                          (i[u] = !(s[u] = d));
                    }
                  } else (b = v(b === s ? b.splice(p, b.length) : b)), o ? o(null, s, b, l) : Z.apply(s, b);
                })
              );
            }
            function b(e) {
              for (
                var t,
                  n,
                  i,
                  r = e.length,
                  o = x.relative[e[0].type],
                  s = o || x.relative[" "],
                  a = o ? 1 : 0,
                  l = p(
                    function (e) {
                      return e === t;
                    },
                    s,
                    !0
                  ),
                  u = p(
                    function (e) {
                      return te(t, e) > -1;
                    },
                    s,
                    !0
                  ),
                  c = [
                    function (e, n, i) {
                      var r =
                        (!o && (i || n !== N)) ||
                        ((t = n).nodeType ? l(e, n, i) : u(e, n, i));
                      return (t = null), r;
                    },
                  ];
                a < r;
                a++
              )
                if ((n = x.relative[e[a].type])) c = [p(m(c), n)];
                else {
                  if ((n = x.filter[e[a].type].apply(null, e[a].matches))[B]) {
                    for (i = ++a; i < r && !x.relative[e[i].type]; i++);
                    return y(
                      a > 1 && m(c),
                      a > 1 &&
                        h(
                          e
                            .slice(0, a - 1)
                            .concat({ value: " " === e[a - 2].type ? "*" : "" })
                        ).replace(le, "$1"),
                      n,
                      a < i && b(e.slice(a, i)),
                      i < r && b((e = e.slice(i))),
                      i < r && h(e)
                    );
                  }
                  c.push(n);
                }
              return m(c);
            }
            function _(e, n) {
              var r = n.length > 0,
                o = e.length > 0,
                s = function (i, s, a, l, u) {
                  var c,
                    d,
                    f,
                    h = 0,
                    p = "0",
                    m = i && [],
                    g = [],
                    y = N,
                    b = i || (o && x.find.TAG("*", u)),
                    _ = (H += null == y ? 1 : Math.random() || 0.1),
                    w = b.length;
                  for (
                    u && (N = s == L || s || u);
                    p !== w && null != (c = b[p]);
                    p++
                  ) {
                    if (o && c) {
                      for (
                        d = 0, s || c.ownerDocument == L || (j(c), (a = !M));
                        (f = e[d++]);

                      )
                        if (f(c, s || L, a)) {
                          l.push(c);
                          break;
                        }
                      u && (H = _);
                    }
                    r && ((c = !f && c) && h--, i && m.push(c));
                  }
                  if (((h += p), r && p !== h)) {
                    for (d = 0; (f = n[d++]); ) f(m, g, s, a);
                    if (i) {
                      if (h > 0)
                        for (; p--; ) m[p] || g[p] || (g[p] = G.call(l));
                      g = v(g);
                    }
                    Z.apply(l, g),
                      u &&
                        !i &&
                        g.length > 0 &&
                        h + n.length > 1 &&
                        t.uniqueSort(l);
                  }
                  return u && ((H = _), (N = y)), m;
                };
              return r ? i(s) : s;
            }
            var w,
              E,
              x,
              T,
              C,
              A,
              k,
              S,
              N,
              O,
              D,
              j,
              L,
              I,
              M,
              F,
              q,
              P,
              R,
              B = "sizzle" + 1 * new Date(),
              $ = e.document,
              H = 0,
              W = 0,
              V = n(),
              U = n(),
              z = n(),
              K = n(),
              Q = function (e, t) {
                return e === t && (D = !0), 0;
              },
              X = {}.hasOwnProperty,
              Y = [],
              G = Y.pop,
              J = Y.push,
              Z = Y.push,
              ee = Y.slice,
              te = function (e, t) {
                for (var n = 0, i = e.length; n < i; n++)
                  if (e[n] === t) return n;
                return -1;
              },
              ne =
                "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
              ie = "[\\x20\\t\\r\\n\\f]",
              re =
                "(?:\\\\[\\da-fA-F]{1,6}" +
                ie +
                "?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",
              oe =
                "\\[" +
                ie +
                "*(" +
                re +
                ")(?:" +
                ie +
                "*([*^$|!~]?=)" +
                ie +
                "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" +
                re +
                "))|)" +
                ie +
                "*\\]",
              se =
                ":(" +
                re +
                ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" +
                oe +
                ")*)|.*)\\)|)",
              ae = new RegExp(ie + "+", "g"),
              le = new RegExp(
                "^" + ie + "+|((?:^|[^\\\\])(?:\\\\.)*)" + ie + "+$",
                "g"
              ),
              ue = new RegExp("^" + ie + "*," + ie + "*"),
              ce = new RegExp("^" + ie + "*([>+~]|" + ie + ")" + ie + "*"),
              de = new RegExp(ie + "|>"),
              fe = new RegExp(se),
              he = new RegExp("^" + re + "$"),
              pe = {
                ID: new RegExp("^#(" + re + ")"),
                CLASS: new RegExp("^\\.(" + re + ")"),
                TAG: new RegExp("^(" + re + "|[*])"),
                ATTR: new RegExp("^" + oe),
                PSEUDO: new RegExp("^" + se),
                CHILD: new RegExp(
                  "^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" +
                    ie +
                    "*(even|odd|(([+-]|)(\\d*)n|)" +
                    ie +
                    "*(?:([+-]|)" +
                    ie +
                    "*(\\d+)|))" +
                    ie +
                    "*\\)|)",
                  "i"
                ),
                bool: new RegExp("^(?:" + ne + ")$", "i"),
                needsContext: new RegExp(
                  "^" +
                    ie +
                    "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" +
                    ie +
                    "*((?:-\\d)?\\d*)" +
                    ie +
                    "*\\)|)(?=[^-]|$)",
                  "i"
                ),
              },
              me = /HTML$/i,
              ge = /^(?:input|select|textarea|button)$/i,
              ve = /^h\d$/i,
              ye = /^[^{]+\{\s*\[native \w/,
              be = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
              _e = /[+~]/,
              we = new RegExp(
                "\\\\[\\da-fA-F]{1,6}" + ie + "?|\\\\([^\\r\\n\\f])",
                "g"
              ),
              Ee = function (e, t) {
                var n = "0x" + e.slice(1) - 65536;
                return (
                  t ||
                  (n < 0
                    ? String.fromCharCode(n + 65536)
                    : String.fromCharCode(
                        (n >> 10) | 55296,
                        (1023 & n) | 56320
                      ))
                );
              },
              xe = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
              Te = function (e, t) {
                return t
                  ? "\0" === e
                    ? "\ufffd"
                    : e.slice(0, -1) +
                      "\\" +
                      e.charCodeAt(e.length - 1).toString(16) +
                      " "
                  : "\\" + e;
              },
              Ce = function () {
                j();
              },
              Ae = p(
                function (e) {
                  return (
                    !0 === e.disabled && "fieldset" === e.nodeName.toLowerCase()
                  );
                },
                { dir: "parentNode", next: "legend" }
              );
            try {
              Z.apply((Y = ee.call($.childNodes)), $.childNodes),
                Y[$.childNodes.length].nodeType;
            } catch (e) {
              Z = {
                apply: Y.length
                  ? function (e, t) {
                      J.apply(e, ee.call(t));
                    }
                  : function (e, t) {
                      for (var n = e.length, i = 0; (e[n++] = t[i++]); );
                      e.length = n - 1;
                    },
              };
            }
            for (w in ((E = t.support = {}),
            (C = t.isXML =
              function (e) {
                var t = e && e.namespaceURI,
                  n = e && (e.ownerDocument || e).documentElement;
                return !me.test(t || (n && n.nodeName) || "HTML");
              }),
            (j = t.setDocument =
              function (e) {
                var t,
                  n,
                  i = e ? e.ownerDocument || e : $;
                return i != L && 9 === i.nodeType && i.documentElement
                  ? ((I = (L = i).documentElement),
                    (M = !C(L)),
                    $ != L &&
                      (n = L.defaultView) &&
                      n.top !== n &&
                      (n.addEventListener
                        ? n.addEventListener("unload", Ce, !1)
                        : n.attachEvent && n.attachEvent("onunload", Ce)),
                    (E.scope = r(function (e) {
                      return (
                        I.appendChild(e).appendChild(L.createElement("div")),
                        void 0 !== e.querySelectorAll &&
                          !e.querySelectorAll(":scope fieldset div").length
                      );
                    })),
                    (E.attributes = r(function (e) {
                      return (e.className = "i"), !e.getAttribute("className");
                    })),
                    (E.getElementsByTagName = r(function (e) {
                      return (
                        e.appendChild(L.createComment("")),
                        !e.getElementsByTagName("*").length
                      );
                    })),
                    (E.getElementsByClassName = ye.test(
                      L.getElementsByClassName
                    )),
                    (E.getById = r(function (e) {
                      return (
                        (I.appendChild(e).id = B),
                        !L.getElementsByName || !L.getElementsByName(B).length
                      );
                    })),
                    E.getById
                      ? ((x.filter.ID = function (e) {
                          var t = e.replace(we, Ee);
                          return function (e) {
                            return e.getAttribute("id") === t;
                          };
                        }),
                        (x.find.ID = function (e, t) {
                          if (void 0 !== t.getElementById && M) {
                            var n = t.getElementById(e);
                            return n ? [n] : [];
                          }
                        }))
                      : ((x.filter.ID = function (e) {
                          var t = e.replace(we, Ee);
                          return function (e) {
                            var n =
                              void 0 !== e.getAttributeNode &&
                              e.getAttributeNode("id");
                            return n && n.value === t;
                          };
                        }),
                        (x.find.ID = function (e, t) {
                          if (void 0 !== t.getElementById && M) {
                            var n,
                              i,
                              r,
                              o = t.getElementById(e);
                            if (o) {
                              if (
                                (n = o.getAttributeNode("id")) &&
                                n.value === e
                              )
                                return [o];
                              for (
                                r = t.getElementsByName(e), i = 0;
                                (o = r[i++]);

                              )
                                if (
                                  (n = o.getAttributeNode("id")) &&
                                  n.value === e
                                )
                                  return [o];
                            }
                            return [];
                          }
                        })),
                    (x.find.TAG = E.getElementsByTagName
                      ? function (e, t) {
                          return void 0 !== t.getElementsByTagName
                            ? t.getElementsByTagName(e)
                            : E.qsa
                            ? t.querySelectorAll(e)
                            : void 0;
                        }
                      : function (e, t) {
                          var n,
                            i = [],
                            r = 0,
                            o = t.getElementsByTagName(e);
                          if ("*" === e) {
                            for (; (n = o[r++]); )
                              1 === n.nodeType && i.push(n);
                            return i;
                          }
                          return o;
                        }),
                    (x.find.CLASS =
                      E.getElementsByClassName &&
                      function (e, t) {
                        if (void 0 !== t.getElementsByClassName && M)
                          return t.getElementsByClassName(e);
                      }),
                    (q = []),
                    (F = []),
                    (E.qsa = ye.test(L.querySelectorAll)) &&
                      (r(function (e) {
                        var t;
                        (I.appendChild(e).innerHTML =
                          "<a id='" +
                          B +
                          "'></a><select id='" +
                          B +
                          "-\r\\' msallowcapture=''><option selected=''></option></select>"),
                          e.querySelectorAll("[msallowcapture^='']").length &&
                            F.push("[*^$]=" + ie + "*(?:''|\"\")"),
                          e.querySelectorAll("[selected]").length ||
                            F.push("\\[" + ie + "*(?:value|" + ne + ")"),
                          e.querySelectorAll("[id~=" + B + "-]").length ||
                            F.push("~="),
                          (t = L.createElement("input")).setAttribute(
                            "name",
                            ""
                          ),
                          e.appendChild(t),
                          e.querySelectorAll("[name='']").length ||
                            F.push(
                              "\\[" +
                                ie +
                                "*name" +
                                ie +
                                "*=" +
                                ie +
                                "*(?:''|\"\")"
                            ),
                          e.querySelectorAll(":checked").length ||
                            F.push(":checked"),
                          e.querySelectorAll("a#" + B + "+*").length ||
                            F.push(".#.+[+~]"),
                          e.querySelectorAll("\\\f"),
                          F.push("[\\r\\n\\f]");
                      }),
                      r(function (e) {
                        e.innerHTML =
                          "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                        var t = L.createElement("input");
                        t.setAttribute("type", "hidden"),
                          e.appendChild(t).setAttribute("name", "D"),
                          e.querySelectorAll("[name=d]").length &&
                            F.push("name" + ie + "*[*^$|!~]?="),
                          2 !== e.querySelectorAll(":enabled").length &&
                            F.push(":enabled", ":disabled"),
                          (I.appendChild(e).disabled = !0),
                          2 !== e.querySelectorAll(":disabled").length &&
                            F.push(":enabled", ":disabled"),
                          e.querySelectorAll("*,:x"),
                          F.push(",.*:");
                      })),
                    (E.matchesSelector = ye.test(
                      (P =
                        I.matches ||
                        I.webkitMatchesSelector ||
                        I.mozMatchesSelector ||
                        I.oMatchesSelector ||
                        I.msMatchesSelector)
                    )) &&
                      r(function (e) {
                        (E.disconnectedMatch = P.call(e, "*")),
                          P.call(e, "[s!='']:x"),
                          q.push("!=", se);
                      }),
                    (F = F.length && new RegExp(F.join("|"))),
                    (q = q.length && new RegExp(q.join("|"))),
                    (t = ye.test(I.compareDocumentPosition)),
                    (R =
                      t || ye.test(I.contains)
                        ? function (e, t) {
                            var n = 9 === e.nodeType ? e.documentElement : e,
                              i = t && t.parentNode;
                            return (
                              e === i ||
                              !(
                                !i ||
                                1 !== i.nodeType ||
                                !(n.contains
                                  ? n.contains(i)
                                  : e.compareDocumentPosition &&
                                    16 & e.compareDocumentPosition(i))
                              )
                            );
                          }
                        : function (e, t) {
                            if (t)
                              for (; (t = t.parentNode); )
                                if (t === e) return !0;
                            return !1;
                          }),
                    (Q = t
                      ? function (e, t) {
                          if (e === t) return (D = !0), 0;
                          var n =
                            !e.compareDocumentPosition -
                            !t.compareDocumentPosition;
                          return (
                            n ||
                            (1 &
                              (n =
                                (e.ownerDocument || e) == (t.ownerDocument || t)
                                  ? e.compareDocumentPosition(t)
                                  : 1) ||
                            (!E.sortDetached &&
                              t.compareDocumentPosition(e) === n)
                              ? e == L || (e.ownerDocument == $ && R($, e))
                                ? -1
                                : t == L || (t.ownerDocument == $ && R($, t))
                                ? 1
                                : O
                                ? te(O, e) - te(O, t)
                                : 0
                              : 4 & n
                              ? -1
                              : 1)
                          );
                        }
                      : function (e, t) {
                          if (e === t) return (D = !0), 0;
                          var n,
                            i = 0,
                            r = e.parentNode,
                            o = t.parentNode,
                            a = [e],
                            l = [t];
                          if (!r || !o)
                            return e == L
                              ? -1
                              : t == L
                              ? 1
                              : r
                              ? -1
                              : o
                              ? 1
                              : O
                              ? te(O, e) - te(O, t)
                              : 0;
                          if (r === o) return s(e, t);
                          for (n = e; (n = n.parentNode); ) a.unshift(n);
                          for (n = t; (n = n.parentNode); ) l.unshift(n);
                          for (; a[i] === l[i]; ) i++;
                          return i
                            ? s(a[i], l[i])
                            : a[i] == $
                            ? -1
                            : l[i] == $
                            ? 1
                            : 0;
                        }),
                    L)
                  : L;
              }),
            (t.matches = function (e, n) {
              return t(e, null, null, n);
            }),
            (t.matchesSelector = function (e, n) {
              if (
                (j(e),
                E.matchesSelector &&
                  M &&
                  !K[n + " "] &&
                  (!q || !q.test(n)) &&
                  (!F || !F.test(n)))
              )
                try {
                  var i = P.call(e, n);
                  if (
                    i ||
                    E.disconnectedMatch ||
                    (e.document && 11 !== e.document.nodeType)
                  )
                    return i;
                } catch (e) {
                  K(n, !0);
                }
              return t(n, L, null, [e]).length > 0;
            }),
            (t.contains = function (e, t) {
              return (e.ownerDocument || e) != L && j(e), R(e, t);
            }),
            (t.attr = function (e, t) {
              (e.ownerDocument || e) != L && j(e);
              var n = x.attrHandle[t.toLowerCase()],
                i =
                  n && X.call(x.attrHandle, t.toLowerCase())
                    ? n(e, t, !M)
                    : void 0;
              return void 0 !== i
                ? i
                : E.attributes || !M
                ? e.getAttribute(t)
                : (i = e.getAttributeNode(t)) && i.specified
                ? i.value
                : null;
            }),
            (t.escape = function (e) {
              return (e + "").replace(xe, Te);
            }),
            (t.error = function (e) {
              throw new Error("Syntax error, unrecognized expression: " + e);
            }),
            (t.uniqueSort = function (e) {
              var t,
                n = [],
                i = 0,
                r = 0;
              if (
                ((D = !E.detectDuplicates),
                (O = !E.sortStable && e.slice(0)),
                e.sort(Q),
                D)
              ) {
                for (; (t = e[r++]); ) t === e[r] && (i = n.push(r));
                for (; i--; ) e.splice(n[i], 1);
              }
              return (O = null), e;
            }),
            (T = t.getText =
              function (e) {
                var t,
                  n = "",
                  i = 0,
                  r = e.nodeType;
                if (r) {
                  if (1 === r || 9 === r || 11 === r) {
                    if ("string" == typeof e.textContent) return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling) n += T(e);
                  } else if (3 === r || 4 === r) return e.nodeValue;
                } else for (; (t = e[i++]); ) n += T(t);
                return n;
              }),
            ((x = t.selectors =
              {
                cacheLength: 50,
                createPseudo: i,
                match: pe,
                attrHandle: {},
                find: {},
                relative: {
                  ">": { dir: "parentNode", first: !0 },
                  " ": { dir: "parentNode" },
                  "+": { dir: "previousSibling", first: !0 },
                  "~": { dir: "previousSibling" },
                },
                preFilter: {
                  ATTR: function (e) {
                    return (
                      (e[1] = e[1].replace(we, Ee)),
                      (e[3] = (e[3] || e[4] || e[5] || "").replace(we, Ee)),
                      "~=" === e[2] && (e[3] = " " + e[3] + " "),
                      e.slice(0, 4)
                    );
                  },
                  CHILD: function (e) {
                    return (
                      (e[1] = e[1].toLowerCase()),
                      "nth" === e[1].slice(0, 3)
                        ? (e[3] || t.error(e[0]),
                          (e[4] = +(e[4]
                            ? e[5] + (e[6] || 1)
                            : 2 * ("even" === e[3] || "odd" === e[3]))),
                          (e[5] = +(e[7] + e[8] || "odd" === e[3])))
                        : e[3] && t.error(e[0]),
                      e
                    );
                  },
                  PSEUDO: function (e) {
                    var t,
                      n = !e[6] && e[2];
                    return pe.CHILD.test(e[0])
                      ? null
                      : (e[3]
                          ? (e[2] = e[4] || e[5] || "")
                          : n &&
                            fe.test(n) &&
                            (t = A(n, !0)) &&
                            (t = n.indexOf(")", n.length - t) - n.length) &&
                            ((e[0] = e[0].slice(0, t)), (e[2] = n.slice(0, t))),
                        e.slice(0, 3));
                  },
                },
                filter: {
                  TAG: function (e) {
                    var t = e.replace(we, Ee).toLowerCase();
                    return "*" === e
                      ? function () {
                          return !0;
                        }
                      : function (e) {
                          return e.nodeName && e.nodeName.toLowerCase() === t;
                        };
                  },
                  CLASS: function (e) {
                    var t = V[e + " "];
                    return (
                      t ||
                      ((t = new RegExp(
                        "(^|" + ie + ")" + e + "(" + ie + "|$)"
                      )) &&
                        V(e, function (e) {
                          return t.test(
                            ("string" == typeof e.className && e.className) ||
                              (void 0 !== e.getAttribute &&
                                e.getAttribute("class")) ||
                              ""
                          );
                        }))
                    );
                  },
                  ATTR: function (e, n, i) {
                    return function (r) {
                      var o = t.attr(r, e);
                      return null == o
                        ? "!=" === n
                        : !n ||
                            ((o += ""),
                            "=" === n
                              ? o === i
                              : "!=" === n
                              ? o !== i
                              : "^=" === n
                              ? i && 0 === o.indexOf(i)
                              : "*=" === n
                              ? i && o.indexOf(i) > -1
                              : "$=" === n
                              ? i && o.slice(-i.length) === i
                              : "~=" === n
                              ? (" " + o.replace(ae, " ") + " ").indexOf(i) > -1
                              : "|=" === n &&
                                (o === i ||
                                  o.slice(0, i.length + 1) === i + "-"));
                    };
                  },
                  CHILD: function (e, t, n, i, r) {
                    var o = "nth" !== e.slice(0, 3),
                      s = "last" !== e.slice(-4),
                      a = "of-type" === t;
                    return 1 === i && 0 === r
                      ? function (e) {
                          return !!e.parentNode;
                        }
                      : function (t, n, l) {
                          var u,
                            c,
                            d,
                            f,
                            h,
                            p,
                            m = o !== s ? "nextSibling" : "previousSibling",
                            g = t.parentNode,
                            v = a && t.nodeName.toLowerCase(),
                            y = !l && !a,
                            b = !1;
                          if (g) {
                            if (o) {
                              for (; m; ) {
                                for (f = t; (f = f[m]); )
                                  if (
                                    a
                                      ? f.nodeName.toLowerCase() === v
                                      : 1 === f.nodeType
                                  )
                                    return !1;
                                p = m = "only" === e && !p && "nextSibling";
                              }
                              return !0;
                            }
                            if (
                              ((p = [s ? g.firstChild : g.lastChild]), s && y)
                            ) {
                              for (
                                b =
                                  (h =
                                    (u =
                                      (c =
                                        (d = (f = g)[B] || (f[B] = {}))[
                                          f.uniqueID
                                        ] || (d[f.uniqueID] = {}))[e] ||
                                      [])[0] === H && u[1]) && u[2],
                                  f = h && g.childNodes[h];
                                (f =
                                  (++h && f && f[m]) || (b = h = 0) || p.pop());

                              )
                                if (1 === f.nodeType && ++b && f === t) {
                                  c[e] = [H, h, b];
                                  break;
                                }
                            } else if (
                              (y &&
                                (b = h =
                                  (u =
                                    (c =
                                      (d = (f = t)[B] || (f[B] = {}))[
                                        f.uniqueID
                                      ] || (d[f.uniqueID] = {}))[e] ||
                                    [])[0] === H && u[1]),
                              !1 === b)
                            )
                              for (
                                ;
                                (f =
                                  (++h && f && f[m]) ||
                                  (b = h = 0) ||
                                  p.pop()) &&
                                ((a
                                  ? f.nodeName.toLowerCase() !== v
                                  : 1 !== f.nodeType) ||
                                  !++b ||
                                  (y &&
                                    ((c =
                                      (d = f[B] || (f[B] = {}))[f.uniqueID] ||
                                      (d[f.uniqueID] = {}))[e] = [H, b]),
                                  f !== t));

                              );
                            return (b -= r) === i || (b % i == 0 && b / i >= 0);
                          }
                        };
                  },
                  PSEUDO: function (e, n) {
                    var r,
                      o =
                        x.pseudos[e] ||
                        x.setFilters[e.toLowerCase()] ||
                        t.error("unsupported pseudo: " + e);
                    return o[B]
                      ? o(n)
                      : o.length > 1
                      ? ((r = [e, e, "", n]),
                        x.setFilters.hasOwnProperty(e.toLowerCase())
                          ? i(function (e, t) {
                              for (var i, r = o(e, n), s = r.length; s--; )
                                e[(i = te(e, r[s]))] = !(t[i] = r[s]);
                            })
                          : function (e) {
                              return o(e, 0, r);
                            })
                      : o;
                  },
                },
                pseudos: {
                  not: i(function (e) {
                    var t = [],
                      n = [],
                      r = k(e.replace(le, "$1"));
                    return r[B]
                      ? i(function (e, t, n, i) {
                          for (
                            var o, s = r(e, null, i, []), a = e.length;
                            a--;

                          )
                            (o = s[a]) && (e[a] = !(t[a] = o));
                        })
                      : function (e, i, o) {
                          return (
                            (t[0] = e),
                            r(t, null, o, n),
                            (t[0] = null),
                            !n.pop()
                          );
                        };
                  }),
                  has: i(function (e) {
                    return function (n) {
                      return t(e, n).length > 0;
                    };
                  }),
                  contains: i(function (e) {
                    return (
                      (e = e.replace(we, Ee)),
                      function (t) {
                        return (t.textContent || T(t)).indexOf(e) > -1;
                      }
                    );
                  }),
                  lang: i(function (e) {
                    return (
                      he.test(e || "") || t.error("unsupported lang: " + e),
                      (e = e.replace(we, Ee).toLowerCase()),
                      function (t) {
                        var n;
                        do {
                          if (
                            (n = M
                              ? t.lang
                              : t.getAttribute("xml:lang") ||
                                t.getAttribute("lang"))
                          )
                            return (
                              (n = n.toLowerCase()) === e ||
                              0 === n.indexOf(e + "-")
                            );
                        } while ((t = t.parentNode) && 1 === t.nodeType);
                        return !1;
                      }
                    );
                  }),
                  target: function (t) {
                    var n = e.location && e.location.hash;
                    return n && n.slice(1) === t.id;
                  },
                  root: function (e) {
                    return e === I;
                  },
                  focus: function (e) {
                    return (
                      e === L.activeElement &&
                      (!L.hasFocus || L.hasFocus()) &&
                      !!(e.type || e.href || ~e.tabIndex)
                    );
                  },
                  enabled: u(!1),
                  disabled: u(!0),
                  checked: function (e) {
                    var t = e.nodeName.toLowerCase();
                    return (
                      ("input" === t && !!e.checked) ||
                      ("option" === t && !!e.selected)
                    );
                  },
                  selected: function (e) {
                    return (
                      e.parentNode && e.parentNode.selectedIndex,
                      !0 === e.selected
                    );
                  },
                  empty: function (e) {
                    for (e = e.firstChild; e; e = e.nextSibling)
                      if (e.nodeType < 6) return !1;
                    return !0;
                  },
                  parent: function (e) {
                    return !x.pseudos.empty(e);
                  },
                  header: function (e) {
                    return ve.test(e.nodeName);
                  },
                  input: function (e) {
                    return ge.test(e.nodeName);
                  },
                  button: function (e) {
                    var t = e.nodeName.toLowerCase();
                    return (
                      ("input" === t && "button" === e.type) || "button" === t
                    );
                  },
                  text: function (e) {
                    var t;
                    return (
                      "input" === e.nodeName.toLowerCase() &&
                      "text" === e.type &&
                      (null == (t = e.getAttribute("type")) ||
                        "text" === t.toLowerCase())
                    );
                  },
                  first: c(function () {
                    return [0];
                  }),
                  last: c(function (e, t) {
                    return [t - 1];
                  }),
                  eq: c(function (e, t, n) {
                    return [n < 0 ? n + t : n];
                  }),
                  even: c(function (e, t) {
                    for (var n = 0; n < t; n += 2) e.push(n);
                    return e;
                  }),
                  odd: c(function (e, t) {
                    for (var n = 1; n < t; n += 2) e.push(n);
                    return e;
                  }),
                  lt: c(function (e, t, n) {
                    for (var i = n < 0 ? n + t : n > t ? t : n; --i >= 0; )
                      e.push(i);
                    return e;
                  }),
                  gt: c(function (e, t, n) {
                    for (var i = n < 0 ? n + t : n; ++i < t; ) e.push(i);
                    return e;
                  }),
                },
              }).pseudos.nth = x.pseudos.eq),
            { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }))
              x.pseudos[w] = a(w);
            for (w in { submit: !0, reset: !0 }) x.pseudos[w] = l(w);
            return (
              (f.prototype = x.filters = x.pseudos),
              (x.setFilters = new f()),
              (A = t.tokenize =
                function (e, n) {
                  var i,
                    r,
                    o,
                    s,
                    a,
                    l,
                    u,
                    c = U[e + " "];
                  if (c) return n ? 0 : c.slice(0);
                  for (a = e, l = [], u = x.preFilter; a; ) {
                    for (s in ((i && !(r = ue.exec(a))) ||
                      (r && (a = a.slice(r[0].length) || a), l.push((o = []))),
                    (i = !1),
                    (r = ce.exec(a)) &&
                      ((i = r.shift()),
                      o.push({ value: i, type: r[0].replace(le, " ") }),
                      (a = a.slice(i.length))),
                    x.filter))
                      !(r = pe[s].exec(a)) ||
                        (u[s] && !(r = u[s](r))) ||
                        ((i = r.shift()),
                        o.push({ value: i, type: s, matches: r }),
                        (a = a.slice(i.length)));
                    if (!i) break;
                  }
                  return n ? a.length : a ? t.error(e) : U(e, l).slice(0);
                }),
              (k = t.compile =
                function (e, t) {
                  var n,
                    i = [],
                    r = [],
                    o = z[e + " "];
                  if (!o) {
                    for (t || (t = A(e)), n = t.length; n--; )
                      (o = b(t[n]))[B] ? i.push(o) : r.push(o);
                    (o = z(e, _(r, i))).selector = e;
                  }
                  return o;
                }),
              (S = t.select =
                function (e, t, n, i) {
                  var r,
                    o,
                    s,
                    a,
                    l,
                    u = "function" == typeof e && e,
                    c = !i && A((e = u.selector || e));
                  if (((n = n || []), 1 === c.length)) {
                    if (
                      (o = c[0] = c[0].slice(0)).length > 2 &&
                      "ID" === (s = o[0]).type &&
                      9 === t.nodeType &&
                      M &&
                      x.relative[o[1].type]
                    ) {
                      if (
                        !(t = (x.find.ID(s.matches[0].replace(we, Ee), t) ||
                          [])[0])
                      )
                        return n;
                      u && (t = t.parentNode),
                        (e = e.slice(o.shift().value.length));
                    }
                    for (
                      r = pe.needsContext.test(e) ? 0 : o.length;
                      r-- && ((s = o[r]), !x.relative[(a = s.type)]);

                    )
                      if (
                        (l = x.find[a]) &&
                        (i = l(
                          s.matches[0].replace(we, Ee),
                          (_e.test(o[0].type) && d(t.parentNode)) || t
                        ))
                      ) {
                        if ((o.splice(r, 1), !(e = i.length && h(o))))
                          return Z.apply(n, i), n;
                        break;
                      }
                  }
                  return (
                    (u || k(e, c))(
                      i,
                      t,
                      !M,
                      n,
                      !t || (_e.test(e) && d(t.parentNode)) || t
                    ),
                    n
                  );
                }),
              (E.sortStable = B.split("").sort(Q).join("") === B),
              (E.detectDuplicates = !!D),
              j(),
              (E.sortDetached = r(function (e) {
                return (
                  1 & e.compareDocumentPosition(L.createElement("fieldset"))
                );
              })),
              r(function (e) {
                return (
                  (e.innerHTML = "<a href='#'></a>"),
                  "#" === e.firstChild.getAttribute("href")
                );
              }) ||
                o("type|href|height|width", function (e, t, n) {
                  if (!n)
                    return e.getAttribute(
                      t,
                      "type" === t.toLowerCase() ? 1 : 2
                    );
                }),
              (E.attributes &&
                r(function (e) {
                  return (
                    (e.innerHTML = "<input/>"),
                    e.firstChild.setAttribute("value", ""),
                    "" === e.firstChild.getAttribute("value")
                  );
                })) ||
                o("value", function (e, t, n) {
                  if (!n && "input" === e.nodeName.toLowerCase())
                    return e.defaultValue;
                }),
              r(function (e) {
                return null == e.getAttribute("disabled");
              }) ||
                o(ne, function (e, t, n) {
                  var i;
                  if (!n)
                    return !0 === e[t]
                      ? t.toLowerCase()
                      : (i = e.getAttributeNode(t)) && i.specified
                      ? i.value
                      : null;
                }),
              t
            );
          })(e);
          (Te.find = Ce),
            (Te.expr = Ce.selectors),
            (Te.expr[":"] = Te.expr.pseudos),
            (Te.uniqueSort = Te.unique = Ce.uniqueSort),
            (Te.text = Ce.getText),
            (Te.isXMLDoc = Ce.isXML),
            (Te.contains = Ce.contains),
            (Te.escapeSelector = Ce.escape);
          var Ae = function (e, t, n) {
              for (
                var i = [], r = void 0 !== n;
                (e = e[t]) && 9 !== e.nodeType;

              )
                if (1 === e.nodeType) {
                  if (r && Te(e).is(n)) break;
                  i.push(e);
                }
              return i;
            },
            ke = function (e, t) {
              for (var n = []; e; e = e.nextSibling)
                1 === e.nodeType && e !== t && n.push(e);
              return n;
            },
            Se = Te.expr.match.needsContext,
            Ne =
              /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
          (Te.filter = function (e, t, n) {
            var i = t[0];
            return (
              n && (e = ":not(" + e + ")"),
              1 === t.length && 1 === i.nodeType
                ? Te.find.matchesSelector(i, e)
                  ? [i]
                  : []
                : Te.find.matches(
                    e,
                    Te.grep(t, function (e) {
                      return 1 === e.nodeType;
                    })
                  )
            );
          }),
            Te.fn.extend({
              find: function (e) {
                var t,
                  n,
                  i = this.length,
                  r = this;
                if ("string" != typeof e)
                  return this.pushStack(
                    Te(e).filter(function () {
                      for (t = 0; t < i; t++)
                        if (Te.contains(r[t], this)) return !0;
                    })
                  );
                for (n = this.pushStack([]), t = 0; t < i; t++)
                  Te.find(e, r[t], n);
                return i > 1 ? Te.uniqueSort(n) : n;
              },
              filter: function (e) {
                return this.pushStack(s(this, e || [], !1));
              },
              not: function (e) {
                return this.pushStack(s(this, e || [], !0));
              },
              is: function (e) {
                return !!s(
                  this,
                  "string" == typeof e && Se.test(e) ? Te(e) : e || [],
                  !1
                ).length;
              },
            });
          var Oe,
            De = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
          ((Te.fn.init = function (e, t, n) {
            var i, r;
            if (!e) return this;
            if (((n = n || Oe), "string" == typeof e)) {
              if (
                !(i =
                  "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3
                    ? [null, e, null]
                    : De.exec(e)) ||
                (!i[1] && t)
              )
                return !t || t.jquery
                  ? (t || n).find(e)
                  : this.constructor(t).find(e);
              if (i[1]) {
                if (
                  ((t = t instanceof Te ? t[0] : t),
                  Te.merge(
                    this,
                    Te.parseHTML(
                      i[1],
                      t && t.nodeType ? t.ownerDocument || t : we,
                      !0
                    )
                  ),
                  Ne.test(i[1]) && Te.isPlainObject(t))
                )
                  for (i in t) be(this[i]) ? this[i](t[i]) : this.attr(i, t[i]);
                return this;
              }
              return (
                (r = we.getElementById(i[2])) &&
                  ((this[0] = r), (this.length = 1)),
                this
              );
            }
            return e.nodeType
              ? ((this[0] = e), (this.length = 1), this)
              : be(e)
              ? void 0 !== n.ready
                ? n.ready(e)
                : e(Te)
              : Te.makeArray(e, this);
          }).prototype = Te.fn),
            (Oe = Te(we));
          var je = /^(?:parents|prev(?:Until|All))/,
            Le = { children: !0, contents: !0, next: !0, prev: !0 };
          Te.fn.extend({
            has: function (e) {
              var t = Te(e, this),
                n = t.length;
              return this.filter(function () {
                for (var e = 0; e < n; e++)
                  if (Te.contains(this, t[e])) return !0;
              });
            },
            closest: function (e, t) {
              var n,
                i = 0,
                r = this.length,
                o = [],
                s = "string" != typeof e && Te(e);
              if (!Se.test(e))
                for (; i < r; i++)
                  for (n = this[i]; n && n !== t; n = n.parentNode)
                    if (
                      n.nodeType < 11 &&
                      (s
                        ? s.index(n) > -1
                        : 1 === n.nodeType && Te.find.matchesSelector(n, e))
                    ) {
                      o.push(n);
                      break;
                    }
              return this.pushStack(o.length > 1 ? Te.uniqueSort(o) : o);
            },
            index: function (e) {
              return e
                ? "string" == typeof e
                  ? fe.call(Te(e), this[0])
                  : fe.call(this, e.jquery ? e[0] : e)
                : this[0] && this[0].parentNode
                ? this.first().prevAll().length
                : -1;
            },
            add: function (e, t) {
              return this.pushStack(
                Te.uniqueSort(Te.merge(this.get(), Te(e, t)))
              );
            },
            addBack: function (e) {
              return this.add(
                null == e ? this.prevObject : this.prevObject.filter(e)
              );
            },
          }),
            Te.each(
              {
                parent: function (e) {
                  var t = e.parentNode;
                  return t && 11 !== t.nodeType ? t : null;
                },
                parents: function (e) {
                  return Ae(e, "parentNode");
                },
                parentsUntil: function (e, t, n) {
                  return Ae(e, "parentNode", n);
                },
                next: function (e) {
                  return a(e, "nextSibling");
                },
                prev: function (e) {
                  return a(e, "previousSibling");
                },
                nextAll: function (e) {
                  return Ae(e, "nextSibling");
                },
                prevAll: function (e) {
                  return Ae(e, "previousSibling");
                },
                nextUntil: function (e, t, n) {
                  return Ae(e, "nextSibling", n);
                },
                prevUntil: function (e, t, n) {
                  return Ae(e, "previousSibling", n);
                },
                siblings: function (e) {
                  return ke((e.parentNode || {}).firstChild, e);
                },
                children: function (e) {
                  return ke(e.firstChild);
                },
                contents: function (e) {
                  return null != e.contentDocument && le(e.contentDocument)
                    ? e.contentDocument
                    : (o(e, "template") && (e = e.content || e),
                      Te.merge([], e.childNodes));
                },
              },
              function (e, t) {
                Te.fn[e] = function (n, i) {
                  var r = Te.map(this, t, n);
                  return (
                    "Until" !== e.slice(-5) && (i = n),
                    i && "string" == typeof i && (r = Te.filter(i, r)),
                    this.length > 1 &&
                      (Le[e] || Te.uniqueSort(r), je.test(e) && r.reverse()),
                    this.pushStack(r)
                  );
                };
              }
            );
          var Ie = /[^\x20\t\r\n\f]+/g;
          (Te.Callbacks = function (e) {
            e = "string" == typeof e ? l(e) : Te.extend({}, e);
            var t,
              n,
              r,
              o,
              s = [],
              a = [],
              u = -1,
              c = function () {
                for (o = o || e.once, r = t = !0; a.length; u = -1)
                  for (n = a.shift(); ++u < s.length; )
                    !1 === s[u].apply(n[0], n[1]) &&
                      e.stopOnFalse &&
                      ((u = s.length), (n = !1));
                e.memory || (n = !1), (t = !1), o && (s = n ? [] : "");
              },
              d = {
                add: function () {
                  return (
                    s &&
                      (n && !t && ((u = s.length - 1), a.push(n)),
                      (function t(n) {
                        Te.each(n, function (n, r) {
                          be(r)
                            ? (e.unique && d.has(r)) || s.push(r)
                            : r && r.length && "string" !== i(r) && t(r);
                        });
                      })(arguments),
                      n && !t && c()),
                    this
                  );
                },
                remove: function () {
                  return (
                    Te.each(arguments, function (e, t) {
                      for (var n; (n = Te.inArray(t, s, n)) > -1; )
                        s.splice(n, 1), n <= u && u--;
                    }),
                    this
                  );
                },
                has: function (e) {
                  return e ? Te.inArray(e, s) > -1 : s.length > 0;
                },
                empty: function () {
                  return s && (s = []), this;
                },
                disable: function () {
                  return (o = a = []), (s = n = ""), this;
                },
                disabled: function () {
                  return !s;
                },
                lock: function () {
                  return (o = a = []), n || t || (s = n = ""), this;
                },
                locked: function () {
                  return !!o;
                },
                fireWith: function (e, n) {
                  return (
                    o ||
                      ((n = [e, (n = n || []).slice ? n.slice() : n]),
                      a.push(n),
                      t || c()),
                    this
                  );
                },
                fire: function () {
                  return d.fireWith(this, arguments), this;
                },
                fired: function () {
                  return !!r;
                },
              };
            return d;
          }),
            Te.extend({
              Deferred: function (t) {
                var n = [
                    [
                      "notify",
                      "progress",
                      Te.Callbacks("memory"),
                      Te.Callbacks("memory"),
                      2,
                    ],
                    [
                      "resolve",
                      "done",
                      Te.Callbacks("once memory"),
                      Te.Callbacks("once memory"),
                      0,
                      "resolved",
                    ],
                    [
                      "reject",
                      "fail",
                      Te.Callbacks("once memory"),
                      Te.Callbacks("once memory"),
                      1,
                      "rejected",
                    ],
                  ],
                  i = "pending",
                  r = {
                    state: function () {
                      return i;
                    },
                    always: function () {
                      return o.done(arguments).fail(arguments), this;
                    },
                    catch: function (e) {
                      return r.then(null, e);
                    },
                    pipe: function () {
                      var e = arguments;
                      return Te.Deferred(function (t) {
                        Te.each(n, function (n, i) {
                          var r = be(e[i[4]]) && e[i[4]];
                          o[i[1]](function () {
                            var e = r && r.apply(this, arguments);
                            e && be(e.promise)
                              ? e
                                  .promise()
                                  .progress(t.notify)
                                  .done(t.resolve)
                                  .fail(t.reject)
                              : t[i[0] + "With"](this, r ? [e] : arguments);
                          });
                        }),
                          (e = null);
                      }).promise();
                    },
                    then: function (t, i, r) {
                      function o(t, n, i, r) {
                        return function () {
                          var a = this,
                            l = arguments,
                            d = function () {
                              var e, d;
                              if (!(t < s)) {
                                if ((e = i.apply(a, l)) === n.promise())
                                  throw new TypeError(
                                    "Thenable self-resolution"
                                  );
                                (d =
                                  e &&
                                  ("object" == typeof e ||
                                    "function" == typeof e) &&
                                  e.then),
                                  be(d)
                                    ? r
                                      ? d.call(e, o(s, n, u, r), o(s, n, c, r))
                                      : (s++,
                                        d.call(
                                          e,
                                          o(s, n, u, r),
                                          o(s, n, c, r),
                                          o(s, n, u, n.notifyWith)
                                        ))
                                    : (i !== u && ((a = void 0), (l = [e])),
                                      (r || n.resolveWith)(a, l));
                              }
                            },
                            f = r
                              ? d
                              : function () {
                                  try {
                                    d();
                                  } catch (e) {
                                    Te.Deferred.exceptionHook &&
                                      Te.Deferred.exceptionHook(
                                        e,
                                        f.stackTrace
                                      ),
                                      t + 1 >= s &&
                                        (i !== c && ((a = void 0), (l = [e])),
                                        n.rejectWith(a, l));
                                  }
                                };
                          t
                            ? f()
                            : (Te.Deferred.getStackHook &&
                                (f.stackTrace = Te.Deferred.getStackHook()),
                              e.setTimeout(f));
                        };
                      }
                      var s = 0;
                      return Te.Deferred(function (e) {
                        n[0][3].add(o(0, e, be(r) ? r : u, e.notifyWith)),
                          n[1][3].add(o(0, e, be(t) ? t : u)),
                          n[2][3].add(o(0, e, be(i) ? i : c));
                      }).promise();
                    },
                    promise: function (e) {
                      return null != e ? Te.extend(e, r) : r;
                    },
                  },
                  o = {};
                return (
                  Te.each(n, function (e, t) {
                    var s = t[2],
                      a = t[5];
                    (r[t[1]] = s.add),
                      a &&
                        s.add(
                          function () {
                            i = a;
                          },
                          n[3 - e][2].disable,
                          n[3 - e][3].disable,
                          n[0][2].lock,
                          n[0][3].lock
                        ),
                      s.add(t[3].fire),
                      (o[t[0]] = function () {
                        return (
                          o[t[0] + "With"](
                            this === o ? void 0 : this,
                            arguments
                          ),
                          this
                        );
                      }),
                      (o[t[0] + "With"] = s.fireWith);
                  }),
                  r.promise(o),
                  t && t.call(o, o),
                  o
                );
              },
              when: function (e) {
                var t = arguments.length,
                  n = t,
                  i = Array(n),
                  r = ue.call(arguments),
                  o = Te.Deferred(),
                  s = function (e) {
                    return function (n) {
                      (i[e] = this),
                        (r[e] = arguments.length > 1 ? ue.call(arguments) : n),
                        --t || o.resolveWith(i, r);
                    };
                  };
                if (
                  t <= 1 &&
                  (d(e, o.done(s(n)).resolve, o.reject, !t),
                  "pending" === o.state() || be(r[n] && r[n].then))
                )
                  return o.then();
                for (; n--; ) d(r[n], s(n), o.reject);
                return o.promise();
              },
            });
          var Me = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
          (Te.Deferred.exceptionHook = function (t, n) {
            e.console &&
              e.console.warn &&
              t &&
              Me.test(t.name) &&
              e.console.warn(
                "jQuery.Deferred exception: " + t.message,
                t.stack,
                n
              );
          }),
            (Te.readyException = function (t) {
              e.setTimeout(function () {
                throw t;
              });
            });
          var Fe = Te.Deferred();
          (Te.fn.ready = function (e) {
            return (
              Fe.then(e).catch(function (e) {
                Te.readyException(e);
              }),
              this
            );
          }),
            Te.extend({
              isReady: !1,
              readyWait: 1,
              ready: function (e) {
                (!0 === e ? --Te.readyWait : Te.isReady) ||
                  ((Te.isReady = !0),
                  (!0 !== e && --Te.readyWait > 0) || Fe.resolveWith(we, [Te]));
              },
            }),
            (Te.ready.then = Fe.then),
            "complete" === we.readyState ||
            ("loading" !== we.readyState && !we.documentElement.doScroll)
              ? e.setTimeout(Te.ready)
              : (we.addEventListener("DOMContentLoaded", f),
                e.addEventListener("load", f));
          var qe = function (e, t, n, r, o, s, a) {
              var l = 0,
                u = e.length,
                c = null == n;
              if ("object" === i(n))
                for (l in ((o = !0), n)) qe(e, t, l, n[l], !0, s, a);
              else if (
                void 0 !== r &&
                ((o = !0),
                be(r) || (a = !0),
                c &&
                  (a
                    ? (t.call(e, r), (t = null))
                    : ((c = t),
                      (t = function (e, t, n) {
                        return c.call(Te(e), n);
                      }))),
                t)
              )
                for (; l < u; l++)
                  t(e[l], n, a ? r : r.call(e[l], l, t(e[l], n)));
              return o ? e : c ? t.call(e) : u ? t(e[0], n) : s;
            },
            Pe = /^-ms-/,
            Re = /-([a-z])/g,
            Be = function (e) {
              return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType;
            };
          (m.uid = 1),
            (m.prototype = {
              cache: function (e) {
                var t = e[this.expando];
                return (
                  t ||
                    ((t = {}),
                    Be(e) &&
                      (e.nodeType
                        ? (e[this.expando] = t)
                        : Object.defineProperty(e, this.expando, {
                            value: t,
                            configurable: !0,
                          }))),
                  t
                );
              },
              set: function (e, t, n) {
                var i,
                  r = this.cache(e);
                if ("string" == typeof t) r[p(t)] = n;
                else for (i in t) r[p(i)] = t[i];
                return r;
              },
              get: function (e, t) {
                return void 0 === t
                  ? this.cache(e)
                  : e[this.expando] && e[this.expando][p(t)];
              },
              access: function (e, t, n) {
                return void 0 === t ||
                  (t && "string" == typeof t && void 0 === n)
                  ? this.get(e, t)
                  : (this.set(e, t, n), void 0 !== n ? n : t);
              },
              remove: function (e, t) {
                var n,
                  i = e[this.expando];
                if (void 0 !== i) {
                  if (void 0 !== t) {
                    n = (t = Array.isArray(t)
                      ? t.map(p)
                      : (t = p(t)) in i
                      ? [t]
                      : t.match(Ie) || []).length;
                    for (; n--; ) delete i[t[n]];
                  }
                  (void 0 === t || Te.isEmptyObject(i)) &&
                    (e.nodeType
                      ? (e[this.expando] = void 0)
                      : delete e[this.expando]);
                }
              },
              hasData: function (e) {
                var t = e[this.expando];
                return void 0 !== t && !Te.isEmptyObject(t);
              },
            });
          var $e = new m(),
            He = new m(),
            We = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
            Ve = /[A-Z]/g;
          Te.extend({
            hasData: function (e) {
              return He.hasData(e) || $e.hasData(e);
            },
            data: function (e, t, n) {
              return He.access(e, t, n);
            },
            removeData: function (e, t) {
              He.remove(e, t);
            },
            _data: function (e, t, n) {
              return $e.access(e, t, n);
            },
            _removeData: function (e, t) {
              $e.remove(e, t);
            },
          }),
            Te.fn.extend({
              data: function (e, t) {
                var n,
                  i,
                  r,
                  o = this[0],
                  s = o && o.attributes;
                if (void 0 === e) {
                  if (
                    this.length &&
                    ((r = He.get(o)),
                    1 === o.nodeType && !$e.get(o, "hasDataAttrs"))
                  ) {
                    for (n = s.length; n--; )
                      s[n] &&
                        0 === (i = s[n].name).indexOf("data-") &&
                        ((i = p(i.slice(5))), v(o, i, r[i]));
                    $e.set(o, "hasDataAttrs", !0);
                  }
                  return r;
                }
                return "object" == typeof e
                  ? this.each(function () {
                      He.set(this, e);
                    })
                  : qe(
                      this,
                      function (t) {
                        var n;
                        if (o && void 0 === t)
                          return void 0 !== (n = He.get(o, e)) ||
                            void 0 !== (n = v(o, e))
                            ? n
                            : void 0;
                        this.each(function () {
                          He.set(this, e, t);
                        });
                      },
                      null,
                      t,
                      arguments.length > 1,
                      null,
                      !0
                    );
              },
              removeData: function (e) {
                return this.each(function () {
                  He.remove(this, e);
                });
              },
            }),
            Te.extend({
              queue: function (e, t, n) {
                var i;
                if (e)
                  return (
                    (t = (t || "fx") + "queue"),
                    (i = $e.get(e, t)),
                    n &&
                      (!i || Array.isArray(n)
                        ? (i = $e.access(e, t, Te.makeArray(n)))
                        : i.push(n)),
                    i || []
                  );
              },
              dequeue: function (e, t) {
                t = t || "fx";
                var n = Te.queue(e, t),
                  i = n.length,
                  r = n.shift(),
                  o = Te._queueHooks(e, t),
                  s = function () {
                    Te.dequeue(e, t);
                  };
                "inprogress" === r && ((r = n.shift()), i--),
                  r &&
                    ("fx" === t && n.unshift("inprogress"),
                    delete o.stop,
                    r.call(e, s, o)),
                  !i && o && o.empty.fire();
              },
              _queueHooks: function (e, t) {
                var n = t + "queueHooks";
                return (
                  $e.get(e, n) ||
                  $e.access(e, n, {
                    empty: Te.Callbacks("once memory").add(function () {
                      $e.remove(e, [t + "queue", n]);
                    }),
                  })
                );
              },
            }),
            Te.fn.extend({
              queue: function (e, t) {
                var n = 2;
                return (
                  "string" != typeof e && ((t = e), (e = "fx"), n--),
                  arguments.length < n
                    ? Te.queue(this[0], e)
                    : void 0 === t
                    ? this
                    : this.each(function () {
                        var n = Te.queue(this, e, t);
                        Te._queueHooks(this, e),
                          "fx" === e &&
                            "inprogress" !== n[0] &&
                            Te.dequeue(this, e);
                      })
                );
              },
              dequeue: function (e) {
                return this.each(function () {
                  Te.dequeue(this, e);
                });
              },
              clearQueue: function (e) {
                return this.queue(e || "fx", []);
              },
              promise: function (e, t) {
                var n,
                  i = 1,
                  r = Te.Deferred(),
                  o = this,
                  s = this.length,
                  a = function () {
                    --i || r.resolveWith(o, [o]);
                  };
                for (
                  "string" != typeof e && ((t = e), (e = void 0)),
                    e = e || "fx";
                  s--;

                )
                  (n = $e.get(o[s], e + "queueHooks")) &&
                    n.empty &&
                    (i++, n.empty.add(a));
                return a(), r.promise(t);
              },
            });
          var Ue = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
            ze = new RegExp("^(?:([+-])=|)(" + Ue + ")([a-z%]*)$", "i"),
            Ke = ["Top", "Right", "Bottom", "Left"],
            Qe = we.documentElement,
            Xe = function (e) {
              return Te.contains(e.ownerDocument, e);
            },
            Ye = { composed: !0 };
          Qe.getRootNode &&
            (Xe = function (e) {
              return (
                Te.contains(e.ownerDocument, e) ||
                e.getRootNode(Ye) === e.ownerDocument
              );
            });
          var Ge = function (e, t) {
              return (
                "none" === (e = t || e).style.display ||
                ("" === e.style.display &&
                  Xe(e) &&
                  "none" === Te.css(e, "display"))
              );
            },
            Je = {};
          Te.fn.extend({
            show: function () {
              return _(this, !0);
            },
            hide: function () {
              return _(this);
            },
            toggle: function (e) {
              return "boolean" == typeof e
                ? e
                  ? this.show()
                  : this.hide()
                : this.each(function () {
                    Ge(this) ? Te(this).show() : Te(this).hide();
                  });
            },
          });
          var Ze,
            et,
            tt = /^(?:checkbox|radio)$/i,
            nt = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
            it = /^$|^module$|\/(?:java|ecma)script/i;
          (Ze = we
            .createDocumentFragment()
            .appendChild(we.createElement("div"))),
            (et = we.createElement("input")).setAttribute("type", "radio"),
            et.setAttribute("checked", "checked"),
            et.setAttribute("name", "t"),
            Ze.appendChild(et),
            (ye.checkClone = Ze.cloneNode(!0).cloneNode(!0).lastChild.checked),
            (Ze.innerHTML = "<textarea>x</textarea>"),
            (ye.noCloneChecked = !!Ze.cloneNode(!0).lastChild.defaultValue),
            (Ze.innerHTML = "<option></option>"),
            (ye.option = !!Ze.lastChild);
          var rt = {
            thead: [1, "<table>", "</table>"],
            col: [2, "<table><colgroup>", "</colgroup></table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: [0, "", ""],
          };
          (rt.tbody = rt.tfoot = rt.colgroup = rt.caption = rt.thead),
            (rt.th = rt.td),
            ye.option ||
              (rt.optgroup = rt.option =
                [1, "<select multiple='multiple'>", "</select>"]);
          var ot = /<|&#?\w+;/,
            st = /^([^.]*)(?:\.(.+)|)/;
          (Te.event = {
            global: {},
            add: function (e, t, n, i, r) {
              var o,
                s,
                a,
                l,
                u,
                c,
                d,
                f,
                h,
                p,
                m,
                g = $e.get(e);
              if (Be(e))
                for (
                  n.handler && ((n = (o = n).handler), (r = o.selector)),
                    r && Te.find.matchesSelector(Qe, r),
                    n.guid || (n.guid = Te.guid++),
                    (l = g.events) || (l = g.events = Object.create(null)),
                    (s = g.handle) ||
                      (s = g.handle =
                        function (t) {
                          return void 0 !== Te && Te.event.triggered !== t.type
                            ? Te.event.dispatch.apply(e, arguments)
                            : void 0;
                        }),
                    u = (t = (t || "").match(Ie) || [""]).length;
                  u--;

                )
                  (h = m = (a = st.exec(t[u]) || [])[1]),
                    (p = (a[2] || "").split(".").sort()),
                    h &&
                      ((d = Te.event.special[h] || {}),
                      (h = (r ? d.delegateType : d.bindType) || h),
                      (d = Te.event.special[h] || {}),
                      (c = Te.extend(
                        {
                          type: h,
                          origType: m,
                          data: i,
                          handler: n,
                          guid: n.guid,
                          selector: r,
                          needsContext: r && Te.expr.match.needsContext.test(r),
                          namespace: p.join("."),
                        },
                        o
                      )),
                      (f = l[h]) ||
                        (((f = l[h] = []).delegateCount = 0),
                        (d.setup && !1 !== d.setup.call(e, i, p, s)) ||
                          (e.addEventListener && e.addEventListener(h, s))),
                      d.add &&
                        (d.add.call(e, c),
                        c.handler.guid || (c.handler.guid = n.guid)),
                      r ? f.splice(f.delegateCount++, 0, c) : f.push(c),
                      (Te.event.global[h] = !0));
            },
            remove: function (e, t, n, i, r) {
              var o,
                s,
                a,
                l,
                u,
                c,
                d,
                f,
                h,
                p,
                m,
                g = $e.hasData(e) && $e.get(e);
              if (g && (l = g.events)) {
                for (u = (t = (t || "").match(Ie) || [""]).length; u--; )
                  if (
                    ((h = m = (a = st.exec(t[u]) || [])[1]),
                    (p = (a[2] || "").split(".").sort()),
                    h)
                  ) {
                    for (
                      d = Te.event.special[h] || {},
                        f =
                          l[(h = (i ? d.delegateType : d.bindType) || h)] || [],
                        a =
                          a[2] &&
                          new RegExp(
                            "(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"
                          ),
                        s = o = f.length;
                      o--;

                    )
                      (c = f[o]),
                        (!r && m !== c.origType) ||
                          (n && n.guid !== c.guid) ||
                          (a && !a.test(c.namespace)) ||
                          (i &&
                            i !== c.selector &&
                            ("**" !== i || !c.selector)) ||
                          (f.splice(o, 1),
                          c.selector && f.delegateCount--,
                          d.remove && d.remove.call(e, c));
                    s &&
                      !f.length &&
                      ((d.teardown && !1 !== d.teardown.call(e, p, g.handle)) ||
                        Te.removeEvent(e, h, g.handle),
                      delete l[h]);
                  } else for (h in l) Te.event.remove(e, h + t[u], n, i, !0);
                Te.isEmptyObject(l) && $e.remove(e, "handle events");
              }
            },
            dispatch: function (e) {
              var t,
                n,
                i,
                r,
                o,
                s,
                a = new Array(arguments.length),
                l = Te.event.fix(e),
                u =
                  ($e.get(this, "events") || Object.create(null))[l.type] || [],
                c = Te.event.special[l.type] || {};
              for (a[0] = l, t = 1; t < arguments.length; t++)
                a[t] = arguments[t];
              if (
                ((l.delegateTarget = this),
                !c.preDispatch || !1 !== c.preDispatch.call(this, l))
              ) {
                for (
                  s = Te.event.handlers.call(this, l, u), t = 0;
                  (r = s[t++]) && !l.isPropagationStopped();

                )
                  for (
                    l.currentTarget = r.elem, n = 0;
                    (o = r.handlers[n++]) && !l.isImmediatePropagationStopped();

                  )
                    (l.rnamespace &&
                      !1 !== o.namespace &&
                      !l.rnamespace.test(o.namespace)) ||
                      ((l.handleObj = o),
                      (l.data = o.data),
                      void 0 !==
                        (i = (
                          (Te.event.special[o.origType] || {}).handle ||
                          o.handler
                        ).apply(r.elem, a)) &&
                        !1 === (l.result = i) &&
                        (l.preventDefault(), l.stopPropagation()));
                return c.postDispatch && c.postDispatch.call(this, l), l.result;
              }
            },
            handlers: function (e, t) {
              var n,
                i,
                r,
                o,
                s,
                a = [],
                l = t.delegateCount,
                u = e.target;
              if (l && u.nodeType && !("click" === e.type && e.button >= 1))
                for (; u !== this; u = u.parentNode || this)
                  if (
                    1 === u.nodeType &&
                    ("click" !== e.type || !0 !== u.disabled)
                  ) {
                    for (o = [], s = {}, n = 0; n < l; n++)
                      void 0 === s[(r = (i = t[n]).selector + " ")] &&
                        (s[r] = i.needsContext
                          ? Te(r, this).index(u) > -1
                          : Te.find(r, this, null, [u]).length),
                        s[r] && o.push(i);
                    o.length && a.push({ elem: u, handlers: o });
                  }
              return (
                (u = this),
                l < t.length && a.push({ elem: u, handlers: t.slice(l) }),
                a
              );
            },
            addProp: function (e, t) {
              Object.defineProperty(Te.Event.prototype, e, {
                enumerable: !0,
                configurable: !0,
                get: be(t)
                  ? function () {
                      if (this.originalEvent) return t(this.originalEvent);
                    }
                  : function () {
                      if (this.originalEvent) return this.originalEvent[e];
                    },
                set: function (t) {
                  Object.defineProperty(this, e, {
                    enumerable: !0,
                    configurable: !0,
                    writable: !0,
                    value: t,
                  });
                },
              });
            },
            fix: function (e) {
              return e[Te.expando] ? e : new Te.Event(e);
            },
            special: {
              load: { noBubble: !0 },
              click: {
                setup: function (e) {
                  var t = this || e;
                  return (
                    tt.test(t.type) &&
                      t.click &&
                      o(t, "input") &&
                      N(t, "click", T),
                    !1
                  );
                },
                trigger: function (e) {
                  var t = this || e;
                  return (
                    tt.test(t.type) &&
                      t.click &&
                      o(t, "input") &&
                      N(t, "click"),
                    !0
                  );
                },
                _default: function (e) {
                  var t = e.target;
                  return (
                    (tt.test(t.type) &&
                      t.click &&
                      o(t, "input") &&
                      $e.get(t, "click")) ||
                    o(t, "a")
                  );
                },
              },
              beforeunload: {
                postDispatch: function (e) {
                  void 0 !== e.result &&
                    e.originalEvent &&
                    (e.originalEvent.returnValue = e.result);
                },
              },
            },
          }),
            (Te.removeEvent = function (e, t, n) {
              e.removeEventListener && e.removeEventListener(t, n);
            }),
            (Te.Event = function (e, t) {
              if (!(this instanceof Te.Event)) return new Te.Event(e, t);
              e && e.type
                ? ((this.originalEvent = e),
                  (this.type = e.type),
                  (this.isDefaultPrevented =
                    e.defaultPrevented ||
                    (void 0 === e.defaultPrevented && !1 === e.returnValue)
                      ? T
                      : C),
                  (this.target =
                    e.target && 3 === e.target.nodeType
                      ? e.target.parentNode
                      : e.target),
                  (this.currentTarget = e.currentTarget),
                  (this.relatedTarget = e.relatedTarget))
                : (this.type = e),
                t && Te.extend(this, t),
                (this.timeStamp = (e && e.timeStamp) || Date.now()),
                (this[Te.expando] = !0);
            }),
            (Te.Event.prototype = {
              constructor: Te.Event,
              isDefaultPrevented: C,
              isPropagationStopped: C,
              isImmediatePropagationStopped: C,
              isSimulated: !1,
              preventDefault: function () {
                var e = this.originalEvent;
                (this.isDefaultPrevented = T),
                  e && !this.isSimulated && e.preventDefault();
              },
              stopPropagation: function () {
                var e = this.originalEvent;
                (this.isPropagationStopped = T),
                  e && !this.isSimulated && e.stopPropagation();
              },
              stopImmediatePropagation: function () {
                var e = this.originalEvent;
                (this.isImmediatePropagationStopped = T),
                  e && !this.isSimulated && e.stopImmediatePropagation(),
                  this.stopPropagation();
              },
            }),
            Te.each(
              {
                altKey: !0,
                bubbles: !0,
                cancelable: !0,
                changedTouches: !0,
                ctrlKey: !0,
                detail: !0,
                eventPhase: !0,
                metaKey: !0,
                pageX: !0,
                pageY: !0,
                shiftKey: !0,
                view: !0,
                char: !0,
                code: !0,
                charCode: !0,
                key: !0,
                keyCode: !0,
                button: !0,
                buttons: !0,
                clientX: !0,
                clientY: !0,
                offsetX: !0,
                offsetY: !0,
                pointerId: !0,
                pointerType: !0,
                screenX: !0,
                screenY: !0,
                targetTouches: !0,
                toElement: !0,
                touches: !0,
                which: !0,
              },
              Te.event.addProp
            ),
            Te.each({ focus: "focusin", blur: "focusout" }, function (e, t) {
              Te.event.special[e] = {
                setup: function () {
                  return N(this, e, A), !1;
                },
                trigger: function () {
                  return N(this, e), !0;
                },
                _default: function () {
                  return !0;
                },
                delegateType: t,
              };
            }),
            Te.each(
              {
                mouseenter: "mouseover",
                mouseleave: "mouseout",
                pointerenter: "pointerover",
                pointerleave: "pointerout",
              },
              function (e, t) {
                Te.event.special[e] = {
                  delegateType: t,
                  bindType: t,
                  handle: function (e) {
                    var n,
                      i = this,
                      r = e.relatedTarget,
                      o = e.handleObj;
                    return (
                      (r && (r === i || Te.contains(i, r))) ||
                        ((e.type = o.origType),
                        (n = o.handler.apply(this, arguments)),
                        (e.type = t)),
                      n
                    );
                  },
                };
              }
            ),
            Te.fn.extend({
              on: function (e, t, n, i) {
                return S(this, e, t, n, i);
              },
              one: function (e, t, n, i) {
                return S(this, e, t, n, i, 1);
              },
              off: function (e, t, n) {
                var i, r;
                if (e && e.preventDefault && e.handleObj)
                  return (
                    (i = e.handleObj),
                    Te(e.delegateTarget).off(
                      i.namespace ? i.origType + "." + i.namespace : i.origType,
                      i.selector,
                      i.handler
                    ),
                    this
                  );
                if ("object" == typeof e) {
                  for (r in e) this.off(r, t, e[r]);
                  return this;
                }
                return (
                  (!1 !== t && "function" != typeof t) ||
                    ((n = t), (t = void 0)),
                  !1 === n && (n = C),
                  this.each(function () {
                    Te.event.remove(this, e, n, t);
                  })
                );
              },
            });
          var at = /<script|<style|<link/i,
            lt = /checked\s*(?:[^=]|=\s*.checked.)/i,
            ut = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
          Te.extend({
            htmlPrefilter: function (e) {
              return e;
            },
            clone: function (e, t, n) {
              var i,
                r,
                o,
                s,
                a = e.cloneNode(!0),
                l = Xe(e);
              if (
                !(
                  ye.noCloneChecked ||
                  (1 !== e.nodeType && 11 !== e.nodeType) ||
                  Te.isXMLDoc(e)
                )
              )
                for (s = w(a), i = 0, r = (o = w(e)).length; i < r; i++)
                  I(o[i], s[i]);
              if (t)
                if (n)
                  for (
                    o = o || w(e), s = s || w(a), i = 0, r = o.length;
                    i < r;
                    i++
                  )
                    L(o[i], s[i]);
                else L(e, a);
              return (
                (s = w(a, "script")).length > 0 && E(s, !l && w(e, "script")), a
              );
            },
            cleanData: function (e) {
              for (
                var t, n, i, r = Te.event.special, o = 0;
                void 0 !== (n = e[o]);
                o++
              )
                if (Be(n)) {
                  if ((t = n[$e.expando])) {
                    if (t.events)
                      for (i in t.events)
                        r[i]
                          ? Te.event.remove(n, i)
                          : Te.removeEvent(n, i, t.handle);
                    n[$e.expando] = void 0;
                  }
                  n[He.expando] && (n[He.expando] = void 0);
                }
            },
          }),
            Te.fn.extend({
              detach: function (e) {
                return F(this, e, !0);
              },
              remove: function (e) {
                return F(this, e);
              },
              text: function (e) {
                return qe(
                  this,
                  function (e) {
                    return void 0 === e
                      ? Te.text(this)
                      : this.empty().each(function () {
                          (1 !== this.nodeType &&
                            11 !== this.nodeType &&
                            9 !== this.nodeType) ||
                            (this.textContent = e);
                        });
                  },
                  null,
                  e,
                  arguments.length
                );
              },
              append: function () {
                return M(this, arguments, function (e) {
                  (1 !== this.nodeType &&
                    11 !== this.nodeType &&
                    9 !== this.nodeType) ||
                    O(this, e).appendChild(e);
                });
              },
              prepend: function () {
                return M(this, arguments, function (e) {
                  if (
                    1 === this.nodeType ||
                    11 === this.nodeType ||
                    9 === this.nodeType
                  ) {
                    var t = O(this, e);
                    t.insertBefore(e, t.firstChild);
                  }
                });
              },
              before: function () {
                return M(this, arguments, function (e) {
                  this.parentNode && this.parentNode.insertBefore(e, this);
                });
              },
              after: function () {
                return M(this, arguments, function (e) {
                  this.parentNode &&
                    this.parentNode.insertBefore(e, this.nextSibling);
                });
              },
              empty: function () {
                for (var e, t = 0; null != (e = this[t]); t++)
                  1 === e.nodeType &&
                    (Te.cleanData(w(e, !1)), (e.textContent = ""));
                return this;
              },
              clone: function (e, t) {
                return (
                  (e = null != e && e),
                  (t = null == t ? e : t),
                  this.map(function () {
                    return Te.clone(this, e, t);
                  })
                );
              },
              html: function (e) {
                return qe(
                  this,
                  function (e) {
                    var t = this[0] || {},
                      n = 0,
                      i = this.length;
                    if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                    if (
                      "string" == typeof e &&
                      !at.test(e) &&
                      !rt[(nt.exec(e) || ["", ""])[1].toLowerCase()]
                    ) {
                      e = Te.htmlPrefilter(e);
                      try {
                        for (; n < i; n++)
                          1 === (t = this[n] || {}).nodeType &&
                            (Te.cleanData(w(t, !1)), (t.innerHTML = e));
                        t = 0;
                      } catch (e) {}
                    }
                    t && this.empty().append(e);
                  },
                  null,
                  e,
                  arguments.length
                );
              },
              replaceWith: function () {
                var e = [];
                return M(
                  this,
                  arguments,
                  function (t) {
                    var n = this.parentNode;
                    Te.inArray(this, e) < 0 &&
                      (Te.cleanData(w(this)), n && n.replaceChild(t, this));
                  },
                  e
                );
              },
            }),
            Te.each(
              {
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith",
              },
              function (e, t) {
                Te.fn[e] = function (e) {
                  for (
                    var n, i = [], r = Te(e), o = r.length - 1, s = 0;
                    s <= o;
                    s++
                  )
                    (n = s === o ? this : this.clone(!0)),
                      Te(r[s])[t](n),
                      de.apply(i, n.get());
                  return this.pushStack(i);
                };
              }
            );
          var ct = new RegExp("^(" + Ue + ")(?!px)[a-z%]+$", "i"),
            dt = function (t) {
              var n = t.ownerDocument.defaultView;
              return (n && n.opener) || (n = e), n.getComputedStyle(t);
            },
            ft = function (e, t, n) {
              var i,
                r,
                o = {};
              for (r in t) (o[r] = e.style[r]), (e.style[r] = t[r]);
              for (r in ((i = n.call(e)), t)) e.style[r] = o[r];
              return i;
            },
            ht = new RegExp(Ke.join("|"), "i");
          !(function () {
            function t() {
              if (c) {
                (u.style.cssText =
                  "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0"),
                  (c.style.cssText =
                    "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%"),
                  Qe.appendChild(u).appendChild(c);
                var t = e.getComputedStyle(c);
                (i = "1%" !== t.top),
                  (l = 12 === n(t.marginLeft)),
                  (c.style.right = "60%"),
                  (s = 36 === n(t.right)),
                  (r = 36 === n(t.width)),
                  (c.style.position = "absolute"),
                  (o = 12 === n(c.offsetWidth / 3)),
                  Qe.removeChild(u),
                  (c = null);
              }
            }
            function n(e) {
              return Math.round(parseFloat(e));
            }
            var i,
              r,
              o,
              s,
              a,
              l,
              u = we.createElement("div"),
              c = we.createElement("div");
            c.style &&
              ((c.style.backgroundClip = "content-box"),
              (c.cloneNode(!0).style.backgroundClip = ""),
              (ye.clearCloneStyle = "content-box" === c.style.backgroundClip),
              Te.extend(ye, {
                boxSizingReliable: function () {
                  return t(), r;
                },
                pixelBoxStyles: function () {
                  return t(), s;
                },
                pixelPosition: function () {
                  return t(), i;
                },
                reliableMarginLeft: function () {
                  return t(), l;
                },
                scrollboxSize: function () {
                  return t(), o;
                },
                reliableTrDimensions: function () {
                  var t, n, i, r;
                  return (
                    null == a &&
                      ((t = we.createElement("table")),
                      (n = we.createElement("tr")),
                      (i = we.createElement("div")),
                      (t.style.cssText =
                        "position:absolute;left:-11111px;border-collapse:separate"),
                      (n.style.cssText = "border:1px solid"),
                      (n.style.height = "1px"),
                      (i.style.height = "9px"),
                      (i.style.display = "block"),
                      Qe.appendChild(t).appendChild(n).appendChild(i),
                      (r = e.getComputedStyle(n)),
                      (a =
                        parseInt(r.height, 10) +
                          parseInt(r.borderTopWidth, 10) +
                          parseInt(r.borderBottomWidth, 10) ===
                        n.offsetHeight),
                      Qe.removeChild(t)),
                    a
                  );
                },
              }));
          })();
          var pt = ["Webkit", "Moz", "ms"],
            mt = we.createElement("div").style,
            gt = {},
            vt = /^(none|table(?!-c[ea]).+)/,
            yt = /^--/,
            bt = {
              position: "absolute",
              visibility: "hidden",
              display: "block",
            },
            _t = { letterSpacing: "0", fontWeight: "400" };
          Te.extend({
            cssHooks: {
              opacity: {
                get: function (e, t) {
                  if (t) {
                    var n = q(e, "opacity");
                    return "" === n ? "1" : n;
                  }
                },
              },
            },
            cssNumber: {
              animationIterationCount: !0,
              columnCount: !0,
              fillOpacity: !0,
              flexGrow: !0,
              flexShrink: !0,
              fontWeight: !0,
              gridArea: !0,
              gridColumn: !0,
              gridColumnEnd: !0,
              gridColumnStart: !0,
              gridRow: !0,
              gridRowEnd: !0,
              gridRowStart: !0,
              lineHeight: !0,
              opacity: !0,
              order: !0,
              orphans: !0,
              widows: !0,
              zIndex: !0,
              zoom: !0,
            },
            cssProps: {},
            style: function (e, t, n, i) {
              if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var r,
                  o,
                  s,
                  a = p(t),
                  l = yt.test(t),
                  u = e.style;
                if (
                  (l || (t = B(a)),
                  (s = Te.cssHooks[t] || Te.cssHooks[a]),
                  void 0 === n)
                )
                  return s && "get" in s && void 0 !== (r = s.get(e, !1, i))
                    ? r
                    : u[t];
                "string" === (o = typeof n) &&
                  (r = ze.exec(n)) &&
                  r[1] &&
                  ((n = y(e, t, r)), (o = "number")),
                  null != n &&
                    n == n &&
                    ("number" !== o ||
                      l ||
                      (n += (r && r[3]) || (Te.cssNumber[a] ? "" : "px")),
                    ye.clearCloneStyle ||
                      "" !== n ||
                      0 !== t.indexOf("background") ||
                      (u[t] = "inherit"),
                    (s && "set" in s && void 0 === (n = s.set(e, n, i))) ||
                      (l ? u.setProperty(t, n) : (u[t] = n)));
              }
            },
            css: function (e, t, n, i) {
              var r,
                o,
                s,
                a = p(t);
              return (
                yt.test(t) || (t = B(a)),
                (s = Te.cssHooks[t] || Te.cssHooks[a]) &&
                  "get" in s &&
                  (r = s.get(e, !0, n)),
                void 0 === r && (r = q(e, t, i)),
                "normal" === r && t in _t && (r = _t[t]),
                "" === n || n
                  ? ((o = parseFloat(r)), !0 === n || isFinite(o) ? o || 0 : r)
                  : r
              );
            },
          }),
            Te.each(["height", "width"], function (e, t) {
              Te.cssHooks[t] = {
                get: function (e, n, i) {
                  if (n)
                    return !vt.test(Te.css(e, "display")) ||
                      (e.getClientRects().length &&
                        e.getBoundingClientRect().width)
                      ? W(e, t, i)
                      : ft(e, bt, function () {
                          return W(e, t, i);
                        });
                },
                set: function (e, n, i) {
                  var r,
                    o = dt(e),
                    s = !ye.scrollboxSize() && "absolute" === o.position,
                    a =
                      (s || i) &&
                      "border-box" === Te.css(e, "boxSizing", !1, o),
                    l = i ? H(e, t, i, a, o) : 0;
                  return (
                    a &&
                      s &&
                      (l -= Math.ceil(
                        e["offset" + t[0].toUpperCase() + t.slice(1)] -
                          parseFloat(o[t]) -
                          H(e, t, "border", !1, o) -
                          0.5
                      )),
                    l &&
                      (r = ze.exec(n)) &&
                      "px" !== (r[3] || "px") &&
                      ((e.style[t] = n), (n = Te.css(e, t))),
                    $(e, n, l)
                  );
                },
              };
            }),
            (Te.cssHooks.marginLeft = P(ye.reliableMarginLeft, function (e, t) {
              if (t)
                return (
                  (parseFloat(q(e, "marginLeft")) ||
                    e.getBoundingClientRect().left -
                      ft(e, { marginLeft: 0 }, function () {
                        return e.getBoundingClientRect().left;
                      })) + "px"
                );
            })),
            Te.each(
              { margin: "", padding: "", border: "Width" },
              function (e, t) {
                (Te.cssHooks[e + t] = {
                  expand: function (n) {
                    for (
                      var i = 0,
                        r = {},
                        o = "string" == typeof n ? n.split(" ") : [n];
                      i < 4;
                      i++
                    )
                      r[e + Ke[i] + t] = o[i] || o[i - 2] || o[0];
                    return r;
                  },
                }),
                  "margin" !== e && (Te.cssHooks[e + t].set = $);
              }
            ),
            Te.fn.extend({
              css: function (e, t) {
                return qe(
                  this,
                  function (e, t, n) {
                    var i,
                      r,
                      o = {},
                      s = 0;
                    if (Array.isArray(t)) {
                      for (i = dt(e), r = t.length; s < r; s++)
                        o[t[s]] = Te.css(e, t[s], !1, i);
                      return o;
                    }
                    return void 0 !== n ? Te.style(e, t, n) : Te.css(e, t);
                  },
                  e,
                  t,
                  arguments.length > 1
                );
              },
            }),
            (Te.Tween = V),
            (V.prototype = {
              constructor: V,
              init: function (e, t, n, i, r, o) {
                (this.elem = e),
                  (this.prop = n),
                  (this.easing = r || Te.easing._default),
                  (this.options = t),
                  (this.start = this.now = this.cur()),
                  (this.end = i),
                  (this.unit = o || (Te.cssNumber[n] ? "" : "px"));
              },
              cur: function () {
                var e = V.propHooks[this.prop];
                return e && e.get
                  ? e.get(this)
                  : V.propHooks._default.get(this);
              },
              run: function (e) {
                var t,
                  n = V.propHooks[this.prop];
                return (
                  this.options.duration
                    ? (this.pos = t =
                        Te.easing[this.easing](
                          e,
                          this.options.duration * e,
                          0,
                          1,
                          this.options.duration
                        ))
                    : (this.pos = t = e),
                  (this.now = (this.end - this.start) * t + this.start),
                  this.options.step &&
                    this.options.step.call(this.elem, this.now, this),
                  n && n.set ? n.set(this) : V.propHooks._default.set(this),
                  this
                );
              },
            }),
            (V.prototype.init.prototype = V.prototype),
            (V.propHooks = {
              _default: {
                get: function (e) {
                  var t;
                  return 1 !== e.elem.nodeType ||
                    (null != e.elem[e.prop] && null == e.elem.style[e.prop])
                    ? e.elem[e.prop]
                    : (t = Te.css(e.elem, e.prop, "")) && "auto" !== t
                    ? t
                    : 0;
                },
                set: function (e) {
                  Te.fx.step[e.prop]
                    ? Te.fx.step[e.prop](e)
                    : 1 !== e.elem.nodeType ||
                      (!Te.cssHooks[e.prop] && null == e.elem.style[B(e.prop)])
                    ? (e.elem[e.prop] = e.now)
                    : Te.style(e.elem, e.prop, e.now + e.unit);
                },
              },
            }),
            (V.propHooks.scrollTop = V.propHooks.scrollLeft =
              {
                set: function (e) {
                  e.elem.nodeType &&
                    e.elem.parentNode &&
                    (e.elem[e.prop] = e.now);
                },
              }),
            (Te.easing = {
              linear: function (e) {
                return e;
              },
              swing: function (e) {
                return 0.5 - Math.cos(e * Math.PI) / 2;
              },
              _default: "swing",
            }),
            (Te.fx = V.prototype.init),
            (Te.fx.step = {});
          var wt,
            Et,
            xt = /^(?:toggle|show|hide)$/,
            Tt = /queueHooks$/;
          (Te.Animation = Te.extend(G, {
            tweeners: {
              "*": [
                function (e, t) {
                  var n = this.createTween(e, t);
                  return y(n.elem, e, ze.exec(t), n), n;
                },
              ],
            },
            tweener: function (e, t) {
              be(e) ? ((t = e), (e = ["*"])) : (e = e.match(Ie));
              for (var n, i = 0, r = e.length; i < r; i++)
                (n = e[i]),
                  (G.tweeners[n] = G.tweeners[n] || []),
                  G.tweeners[n].unshift(t);
            },
            prefilters: [X],
            prefilter: function (e, t) {
              t ? G.prefilters.unshift(e) : G.prefilters.push(e);
            },
          })),
            (Te.speed = function (e, t, n) {
              var i =
                e && "object" == typeof e
                  ? Te.extend({}, e)
                  : {
                      complete: n || (!n && t) || (be(e) && e),
                      duration: e,
                      easing: (n && t) || (t && !be(t) && t),
                    };
              return (
                Te.fx.off
                  ? (i.duration = 0)
                  : "number" != typeof i.duration &&
                    (i.duration in Te.fx.speeds
                      ? (i.duration = Te.fx.speeds[i.duration])
                      : (i.duration = Te.fx.speeds._default)),
                (null != i.queue && !0 !== i.queue) || (i.queue = "fx"),
                (i.old = i.complete),
                (i.complete = function () {
                  be(i.old) && i.old.call(this),
                    i.queue && Te.dequeue(this, i.queue);
                }),
                i
              );
            }),
            Te.fn.extend({
              fadeTo: function (e, t, n, i) {
                return this.filter(Ge)
                  .css("opacity", 0)
                  .show()
                  .end()
                  .animate({ opacity: t }, e, n, i);
              },
              animate: function (e, t, n, i) {
                var r = Te.isEmptyObject(e),
                  o = Te.speed(t, n, i),
                  s = function () {
                    var t = G(this, Te.extend({}, e), o);
                    (r || $e.get(this, "finish")) && t.stop(!0);
                  };
                return (
                  (s.finish = s),
                  r || !1 === o.queue ? this.each(s) : this.queue(o.queue, s)
                );
              },
              stop: function (e, t, n) {
                var i = function (e) {
                  var t = e.stop;
                  delete e.stop, t(n);
                };
                return (
                  "string" != typeof e && ((n = t), (t = e), (e = void 0)),
                  t && this.queue(e || "fx", []),
                  this.each(function () {
                    var t = !0,
                      r = null != e && e + "queueHooks",
                      o = Te.timers,
                      s = $e.get(this);
                    if (r) s[r] && s[r].stop && i(s[r]);
                    else
                      for (r in s) s[r] && s[r].stop && Tt.test(r) && i(s[r]);
                    for (r = o.length; r--; )
                      o[r].elem !== this ||
                        (null != e && o[r].queue !== e) ||
                        (o[r].anim.stop(n), (t = !1), o.splice(r, 1));
                    (!t && n) || Te.dequeue(this, e);
                  })
                );
              },
              finish: function (e) {
                return (
                  !1 !== e && (e = e || "fx"),
                  this.each(function () {
                    var t,
                      n = $e.get(this),
                      i = n[e + "queue"],
                      r = n[e + "queueHooks"],
                      o = Te.timers,
                      s = i ? i.length : 0;
                    for (
                      n.finish = !0,
                        Te.queue(this, e, []),
                        r && r.stop && r.stop.call(this, !0),
                        t = o.length;
                      t--;

                    )
                      o[t].elem === this &&
                        o[t].queue === e &&
                        (o[t].anim.stop(!0), o.splice(t, 1));
                    for (t = 0; t < s; t++)
                      i[t] && i[t].finish && i[t].finish.call(this);
                    delete n.finish;
                  })
                );
              },
            }),
            Te.each(["toggle", "show", "hide"], function (e, t) {
              var n = Te.fn[t];
              Te.fn[t] = function (e, i, r) {
                return null == e || "boolean" == typeof e
                  ? n.apply(this, arguments)
                  : this.animate(K(t, !0), e, i, r);
              };
            }),
            Te.each(
              {
                slideDown: K("show"),
                slideUp: K("hide"),
                slideToggle: K("toggle"),
                fadeIn: { opacity: "show" },
                fadeOut: { opacity: "hide" },
                fadeToggle: { opacity: "toggle" },
              },
              function (e, t) {
                Te.fn[e] = function (e, n, i) {
                  return this.animate(t, e, n, i);
                };
              }
            ),
            (Te.timers = []),
            (Te.fx.tick = function () {
              var e,
                t = 0,
                n = Te.timers;
              for (wt = Date.now(); t < n.length; t++)
                (e = n[t])() || n[t] !== e || n.splice(t--, 1);
              n.length || Te.fx.stop(), (wt = void 0);
            }),
            (Te.fx.timer = function (e) {
              Te.timers.push(e), Te.fx.start();
            }),
            (Te.fx.interval = 13),
            (Te.fx.start = function () {
              Et || ((Et = !0), U());
            }),
            (Te.fx.stop = function () {
              Et = null;
            }),
            (Te.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
            (Te.fn.delay = function (t, n) {
              return (
                (t = (Te.fx && Te.fx.speeds[t]) || t),
                (n = n || "fx"),
                this.queue(n, function (n, i) {
                  var r = e.setTimeout(n, t);
                  i.stop = function () {
                    e.clearTimeout(r);
                  };
                })
              );
            }),
            (function () {
              var e = we.createElement("input"),
                t = we
                  .createElement("select")
                  .appendChild(we.createElement("option"));
              (e.type = "checkbox"),
                (ye.checkOn = "" !== e.value),
                (ye.optSelected = t.selected),
                ((e = we.createElement("input")).value = "t"),
                (e.type = "radio"),
                (ye.radioValue = "t" === e.value);
            })();
          var Ct,
            At = Te.expr.attrHandle;
          Te.fn.extend({
            attr: function (e, t) {
              return qe(this, Te.attr, e, t, arguments.length > 1);
            },
            removeAttr: function (e) {
              return this.each(function () {
                Te.removeAttr(this, e);
              });
            },
          }),
            Te.extend({
              attr: function (e, t, n) {
                var i,
                  r,
                  o = e.nodeType;
                if (3 !== o && 8 !== o && 2 !== o)
                  return void 0 === e.getAttribute
                    ? Te.prop(e, t, n)
                    : ((1 === o && Te.isXMLDoc(e)) ||
                        (r =
                          Te.attrHooks[t.toLowerCase()] ||
                          (Te.expr.match.bool.test(t) ? Ct : void 0)),
                      void 0 !== n
                        ? null === n
                          ? void Te.removeAttr(e, t)
                          : r && "set" in r && void 0 !== (i = r.set(e, n, t))
                          ? i
                          : (e.setAttribute(t, n + ""), n)
                        : r && "get" in r && null !== (i = r.get(e, t))
                        ? i
                        : null == (i = Te.find.attr(e, t))
                        ? void 0
                        : i);
              },
              attrHooks: {
                type: {
                  set: function (e, t) {
                    if (!ye.radioValue && "radio" === t && o(e, "input")) {
                      var n = e.value;
                      return e.setAttribute("type", t), n && (e.value = n), t;
                    }
                  },
                },
              },
              removeAttr: function (e, t) {
                var n,
                  i = 0,
                  r = t && t.match(Ie);
                if (r && 1 === e.nodeType)
                  for (; (n = r[i++]); ) e.removeAttribute(n);
              },
            }),
            (Ct = {
              set: function (e, t, n) {
                return !1 === t ? Te.removeAttr(e, n) : e.setAttribute(n, n), n;
              },
            }),
            Te.each(Te.expr.match.bool.source.match(/\w+/g), function (e, t) {
              var n = At[t] || Te.find.attr;
              At[t] = function (e, t, i) {
                var r,
                  o,
                  s = t.toLowerCase();
                return (
                  i ||
                    ((o = At[s]),
                    (At[s] = r),
                    (r = null != n(e, t, i) ? s : null),
                    (At[s] = o)),
                  r
                );
              };
            });
          var kt = /^(?:input|select|textarea|button)$/i,
            St = /^(?:a|area)$/i;
          Te.fn.extend({
            prop: function (e, t) {
              return qe(this, Te.prop, e, t, arguments.length > 1);
            },
            removeProp: function (e) {
              return this.each(function () {
                delete this[Te.propFix[e] || e];
              });
            },
          }),
            Te.extend({
              prop: function (e, t, n) {
                var i,
                  r,
                  o = e.nodeType;
                if (3 !== o && 8 !== o && 2 !== o)
                  return (
                    (1 === o && Te.isXMLDoc(e)) ||
                      ((t = Te.propFix[t] || t), (r = Te.propHooks[t])),
                    void 0 !== n
                      ? r && "set" in r && void 0 !== (i = r.set(e, n, t))
                        ? i
                        : (e[t] = n)
                      : r && "get" in r && null !== (i = r.get(e, t))
                      ? i
                      : e[t]
                  );
              },
              propHooks: {
                tabIndex: {
                  get: function (e) {
                    var t = Te.find.attr(e, "tabindex");
                    return t
                      ? parseInt(t, 10)
                      : kt.test(e.nodeName) || (St.test(e.nodeName) && e.href)
                      ? 0
                      : -1;
                  },
                },
              },
              propFix: { for: "htmlFor", class: "className" },
            }),
            ye.optSelected ||
              (Te.propHooks.selected = {
                get: function (e) {
                  var t = e.parentNode;
                  return t && t.parentNode && t.parentNode.selectedIndex, null;
                },
                set: function (e) {
                  var t = e.parentNode;
                  t &&
                    (t.selectedIndex,
                    t.parentNode && t.parentNode.selectedIndex);
                },
              }),
            Te.each(
              [
                "tabIndex",
                "readOnly",
                "maxLength",
                "cellSpacing",
                "cellPadding",
                "rowSpan",
                "colSpan",
                "useMap",
                "frameBorder",
                "contentEditable",
              ],
              function () {
                Te.propFix[this.toLowerCase()] = this;
              }
            ),
            Te.fn.extend({
              addClass: function (e) {
                var t,
                  n,
                  i,
                  r,
                  o,
                  s,
                  a,
                  l = 0;
                if (be(e))
                  return this.each(function (t) {
                    Te(this).addClass(e.call(this, t, Z(this)));
                  });
                if ((t = ee(e)).length)
                  for (; (n = this[l++]); )
                    if (
                      ((r = Z(n)), (i = 1 === n.nodeType && " " + J(r) + " "))
                    ) {
                      for (s = 0; (o = t[s++]); )
                        i.indexOf(" " + o + " ") < 0 && (i += o + " ");
                      r !== (a = J(i)) && n.setAttribute("class", a);
                    }
                return this;
              },
              removeClass: function (e) {
                var t,
                  n,
                  i,
                  r,
                  o,
                  s,
                  a,
                  l = 0;
                if (be(e))
                  return this.each(function (t) {
                    Te(this).removeClass(e.call(this, t, Z(this)));
                  });
                if (!arguments.length) return this.attr("class", "");
                if ((t = ee(e)).length)
                  for (; (n = this[l++]); )
                    if (
                      ((r = Z(n)), (i = 1 === n.nodeType && " " + J(r) + " "))
                    ) {
                      for (s = 0; (o = t[s++]); )
                        for (; i.indexOf(" " + o + " ") > -1; )
                          i = i.replace(" " + o + " ", " ");
                      r !== (a = J(i)) && n.setAttribute("class", a);
                    }
                return this;
              },
              toggleClass: function (e, t) {
                var n = typeof e,
                  i = "string" === n || Array.isArray(e);
                return "boolean" == typeof t && i
                  ? t
                    ? this.addClass(e)
                    : this.removeClass(e)
                  : be(e)
                  ? this.each(function (n) {
                      Te(this).toggleClass(e.call(this, n, Z(this), t), t);
                    })
                  : this.each(function () {
                      var t, r, o, s;
                      if (i)
                        for (r = 0, o = Te(this), s = ee(e); (t = s[r++]); )
                          o.hasClass(t) ? o.removeClass(t) : o.addClass(t);
                      else
                        (void 0 !== e && "boolean" !== n) ||
                          ((t = Z(this)) && $e.set(this, "__className__", t),
                          this.setAttribute &&
                            this.setAttribute(
                              "class",
                              t || !1 === e
                                ? ""
                                : $e.get(this, "__className__") || ""
                            ));
                    });
              },
              hasClass: function (e) {
                var t,
                  n,
                  i = 0;
                for (t = " " + e + " "; (n = this[i++]); )
                  if (1 === n.nodeType && (" " + J(Z(n)) + " ").indexOf(t) > -1)
                    return !0;
                return !1;
              },
            });
          var Nt = /\r/g;
          Te.fn.extend({
            val: function (e) {
              var t,
                n,
                i,
                r = this[0];
              return arguments.length
                ? ((i = be(e)),
                  this.each(function (n) {
                    var r;
                    1 === this.nodeType &&
                      (null == (r = i ? e.call(this, n, Te(this).val()) : e)
                        ? (r = "")
                        : "number" == typeof r
                        ? (r += "")
                        : Array.isArray(r) &&
                          (r = Te.map(r, function (e) {
                            return null == e ? "" : e + "";
                          })),
                      ((t =
                        Te.valHooks[this.type] ||
                        Te.valHooks[this.nodeName.toLowerCase()]) &&
                        "set" in t &&
                        void 0 !== t.set(this, r, "value")) ||
                        (this.value = r));
                  }))
                : r
                ? (t =
                    Te.valHooks[r.type] ||
                    Te.valHooks[r.nodeName.toLowerCase()]) &&
                  "get" in t &&
                  void 0 !== (n = t.get(r, "value"))
                  ? n
                  : "string" == typeof (n = r.value)
                  ? n.replace(Nt, "")
                  : null == n
                  ? ""
                  : n
                : void 0;
            },
          }),
            Te.extend({
              valHooks: {
                option: {
                  get: function (e) {
                    var t = Te.find.attr(e, "value");
                    return null != t ? t : J(Te.text(e));
                  },
                },
                select: {
                  get: function (e) {
                    var t,
                      n,
                      i,
                      r = e.options,
                      s = e.selectedIndex,
                      a = "select-one" === e.type,
                      l = a ? null : [],
                      u = a ? s + 1 : r.length;
                    for (i = s < 0 ? u : a ? s : 0; i < u; i++)
                      if (
                        ((n = r[i]).selected || i === s) &&
                        !n.disabled &&
                        (!n.parentNode.disabled || !o(n.parentNode, "optgroup"))
                      ) {
                        if (((t = Te(n).val()), a)) return t;
                        l.push(t);
                      }
                    return l;
                  },
                  set: function (e, t) {
                    for (
                      var n,
                        i,
                        r = e.options,
                        o = Te.makeArray(t),
                        s = r.length;
                      s--;

                    )
                      ((i = r[s]).selected =
                        Te.inArray(Te.valHooks.option.get(i), o) > -1) &&
                        (n = !0);
                    return n || (e.selectedIndex = -1), o;
                  },
                },
              },
            }),
            Te.each(["radio", "checkbox"], function () {
              (Te.valHooks[this] = {
                set: function (e, t) {
                  if (Array.isArray(t))
                    return (e.checked = Te.inArray(Te(e).val(), t) > -1);
                },
              }),
                ye.checkOn ||
                  (Te.valHooks[this].get = function (e) {
                    return null === e.getAttribute("value") ? "on" : e.value;
                  });
            }),
            (ye.focusin = "onfocusin" in e);
          var Ot = /^(?:focusinfocus|focusoutblur)$/,
            Dt = function (e) {
              e.stopPropagation();
            };
          Te.extend(Te.event, {
            trigger: function (t, n, i, r) {
              var o,
                s,
                a,
                l,
                u,
                c,
                d,
                f,
                h = [i || we],
                p = me.call(t, "type") ? t.type : t,
                m = me.call(t, "namespace") ? t.namespace.split(".") : [];
              if (
                ((s = f = a = i = i || we),
                3 !== i.nodeType &&
                  8 !== i.nodeType &&
                  !Ot.test(p + Te.event.triggered) &&
                  (p.indexOf(".") > -1 &&
                    ((m = p.split(".")), (p = m.shift()), m.sort()),
                  (u = p.indexOf(":") < 0 && "on" + p),
                  ((t = t[Te.expando]
                    ? t
                    : new Te.Event(p, "object" == typeof t && t)).isTrigger = r
                    ? 2
                    : 3),
                  (t.namespace = m.join(".")),
                  (t.rnamespace = t.namespace
                    ? new RegExp(
                        "(^|\\.)" + m.join("\\.(?:.*\\.|)") + "(\\.|$)"
                      )
                    : null),
                  (t.result = void 0),
                  t.target || (t.target = i),
                  (n = null == n ? [t] : Te.makeArray(n, [t])),
                  (d = Te.event.special[p] || {}),
                  r || !d.trigger || !1 !== d.trigger.apply(i, n)))
              ) {
                if (!r && !d.noBubble && !_e(i)) {
                  for (
                    l = d.delegateType || p,
                      Ot.test(l + p) || (s = s.parentNode);
                    s;
                    s = s.parentNode
                  )
                    h.push(s), (a = s);
                  a === (i.ownerDocument || we) &&
                    h.push(a.defaultView || a.parentWindow || e);
                }
                for (o = 0; (s = h[o++]) && !t.isPropagationStopped(); )
                  (f = s),
                    (t.type = o > 1 ? l : d.bindType || p),
                    (c =
                      ($e.get(s, "events") || Object.create(null))[t.type] &&
                      $e.get(s, "handle")) && c.apply(s, n),
                    (c = u && s[u]) &&
                      c.apply &&
                      Be(s) &&
                      ((t.result = c.apply(s, n)),
                      !1 === t.result && t.preventDefault());
                return (
                  (t.type = p),
                  r ||
                    t.isDefaultPrevented() ||
                    (d._default && !1 !== d._default.apply(h.pop(), n)) ||
                    !Be(i) ||
                    (u &&
                      be(i[p]) &&
                      !_e(i) &&
                      ((a = i[u]) && (i[u] = null),
                      (Te.event.triggered = p),
                      t.isPropagationStopped() && f.addEventListener(p, Dt),
                      i[p](),
                      t.isPropagationStopped() && f.removeEventListener(p, Dt),
                      (Te.event.triggered = void 0),
                      a && (i[u] = a))),
                  t.result
                );
              }
            },
            simulate: function (e, t, n) {
              var i = Te.extend(new Te.Event(), n, {
                type: e,
                isSimulated: !0,
              });
              Te.event.trigger(i, null, t);
            },
          }),
            Te.fn.extend({
              trigger: function (e, t) {
                return this.each(function () {
                  Te.event.trigger(e, t, this);
                });
              },
              triggerHandler: function (e, t) {
                var n = this[0];
                if (n) return Te.event.trigger(e, t, n, !0);
              },
            }),
            ye.focusin ||
              Te.each({ focus: "focusin", blur: "focusout" }, function (e, t) {
                var n = function (e) {
                  Te.event.simulate(t, e.target, Te.event.fix(e));
                };
                Te.event.special[t] = {
                  setup: function () {
                    var i = this.ownerDocument || this.document || this,
                      r = $e.access(i, t);
                    r || i.addEventListener(e, n, !0),
                      $e.access(i, t, (r || 0) + 1);
                  },
                  teardown: function () {
                    var i = this.ownerDocument || this.document || this,
                      r = $e.access(i, t) - 1;
                    r
                      ? $e.access(i, t, r)
                      : (i.removeEventListener(e, n, !0), $e.remove(i, t));
                  },
                };
              });
          var jt = e.location,
            Lt = { guid: Date.now() },
            It = /\?/;
          Te.parseXML = function (t) {
            var n, i;
            if (!t || "string" != typeof t) return null;
            try {
              n = new e.DOMParser().parseFromString(t, "text/xml");
            } catch (e) {}
            return (
              (i = n && n.getElementsByTagName("parsererror")[0]),
              (n && !i) ||
                Te.error(
                  "Invalid XML: " +
                    (i
                      ? Te.map(i.childNodes, function (e) {
                          return e.textContent;
                        }).join("\n")
                      : t)
                ),
              n
            );
          };
          var Mt = /\[\]$/,
            Ft = /\r?\n/g,
            qt = /^(?:submit|button|image|reset|file)$/i,
            Pt = /^(?:input|select|textarea|keygen)/i;
          (Te.param = function (e, t) {
            var n,
              i = [],
              r = function (e, t) {
                var n = be(t) ? t() : t;
                i[i.length] =
                  encodeURIComponent(e) +
                  "=" +
                  encodeURIComponent(null == n ? "" : n);
              };
            if (null == e) return "";
            if (Array.isArray(e) || (e.jquery && !Te.isPlainObject(e)))
              Te.each(e, function () {
                r(this.name, this.value);
              });
            else for (n in e) te(n, e[n], t, r);
            return i.join("&");
          }),
            Te.fn.extend({
              serialize: function () {
                return Te.param(this.serializeArray());
              },
              serializeArray: function () {
                return this.map(function () {
                  var e = Te.prop(this, "elements");
                  return e ? Te.makeArray(e) : this;
                })
                  .filter(function () {
                    var e = this.type;
                    return (
                      this.name &&
                      !Te(this).is(":disabled") &&
                      Pt.test(this.nodeName) &&
                      !qt.test(e) &&
                      (this.checked || !tt.test(e))
                    );
                  })
                  .map(function (e, t) {
                    var n = Te(this).val();
                    return null == n
                      ? null
                      : Array.isArray(n)
                      ? Te.map(n, function (e) {
                          return { name: t.name, value: e.replace(Ft, "\r\n") };
                        })
                      : { name: t.name, value: n.replace(Ft, "\r\n") };
                  })
                  .get();
              },
            });
          var Rt = /%20/g,
            Bt = /#.*$/,
            $t = /([?&])_=[^&]*/,
            Ht = /^(.*?):[ \t]*([^\r\n]*)$/gm,
            Wt = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
            Vt = /^(?:GET|HEAD)$/,
            Ut = /^\/\//,
            zt = {},
            Kt = {},
            Qt = "*/".concat("*"),
            Xt = we.createElement("a");
          (Xt.href = jt.href),
            Te.extend({
              active: 0,
              lastModified: {},
              etag: {},
              ajaxSettings: {
                url: jt.href,
                type: "GET",
                isLocal: Wt.test(jt.protocol),
                global: !0,
                processData: !0,
                async: !0,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: {
                  "*": Qt,
                  text: "text/plain",
                  html: "text/html",
                  xml: "application/xml, text/xml",
                  json: "application/json, text/javascript",
                },
                contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ },
                responseFields: {
                  xml: "responseXML",
                  text: "responseText",
                  json: "responseJSON",
                },
                converters: {
                  "* text": String,
                  "text html": !0,
                  "text json": JSON.parse,
                  "text xml": Te.parseXML,
                },
                flatOptions: { url: !0, context: !0 },
              },
              ajaxSetup: function (e, t) {
                return t
                  ? re(re(e, Te.ajaxSettings), t)
                  : re(Te.ajaxSettings, e);
              },
              ajaxPrefilter: ne(zt),
              ajaxTransport: ne(Kt),
              ajax: function (t, n) {
                function i(t, n, i, a) {
                  var u,
                    f,
                    h,
                    _,
                    w,
                    E = n;
                  c ||
                    ((c = !0),
                    l && e.clearTimeout(l),
                    (r = void 0),
                    (s = a || ""),
                    (x.readyState = t > 0 ? 4 : 0),
                    (u = (t >= 200 && t < 300) || 304 === t),
                    i && (_ = oe(p, x, i)),
                    !u &&
                      Te.inArray("script", p.dataTypes) > -1 &&
                      Te.inArray("json", p.dataTypes) < 0 &&
                      (p.converters["text script"] = function () {}),
                    (_ = se(p, _, x, u)),
                    u
                      ? (p.ifModified &&
                          ((w = x.getResponseHeader("Last-Modified")) &&
                            (Te.lastModified[o] = w),
                          (w = x.getResponseHeader("etag")) &&
                            (Te.etag[o] = w)),
                        204 === t || "HEAD" === p.type
                          ? (E = "nocontent")
                          : 304 === t
                          ? (E = "notmodified")
                          : ((E = _.state), (f = _.data), (u = !(h = _.error))))
                      : ((h = E),
                        (!t && E) || ((E = "error"), t < 0 && (t = 0))),
                    (x.status = t),
                    (x.statusText = (n || E) + ""),
                    u
                      ? v.resolveWith(m, [f, E, x])
                      : v.rejectWith(m, [x, E, h]),
                    x.statusCode(b),
                    (b = void 0),
                    d &&
                      g.trigger(u ? "ajaxSuccess" : "ajaxError", [
                        x,
                        p,
                        u ? f : h,
                      ]),
                    y.fireWith(m, [x, E]),
                    d &&
                      (g.trigger("ajaxComplete", [x, p]),
                      --Te.active || Te.event.trigger("ajaxStop")));
                }
                "object" == typeof t && ((n = t), (t = void 0)), (n = n || {});
                var r,
                  o,
                  s,
                  a,
                  l,
                  u,
                  c,
                  d,
                  f,
                  h,
                  p = Te.ajaxSetup({}, n),
                  m = p.context || p,
                  g = p.context && (m.nodeType || m.jquery) ? Te(m) : Te.event,
                  v = Te.Deferred(),
                  y = Te.Callbacks("once memory"),
                  b = p.statusCode || {},
                  _ = {},
                  w = {},
                  E = "canceled",
                  x = {
                    readyState: 0,
                    getResponseHeader: function (e) {
                      var t;
                      if (c) {
                        if (!a)
                          for (a = {}; (t = Ht.exec(s)); )
                            a[t[1].toLowerCase() + " "] = (
                              a[t[1].toLowerCase() + " "] || []
                            ).concat(t[2]);
                        t = a[e.toLowerCase() + " "];
                      }
                      return null == t ? null : t.join(", ");
                    },
                    getAllResponseHeaders: function () {
                      return c ? s : null;
                    },
                    setRequestHeader: function (e, t) {
                      return (
                        null == c &&
                          ((e = w[e.toLowerCase()] = w[e.toLowerCase()] || e),
                          (_[e] = t)),
                        this
                      );
                    },
                    overrideMimeType: function (e) {
                      return null == c && (p.mimeType = e), this;
                    },
                    statusCode: function (e) {
                      var t;
                      if (e)
                        if (c) x.always(e[x.status]);
                        else for (t in e) b[t] = [b[t], e[t]];
                      return this;
                    },
                    abort: function (e) {
                      var t = e || E;
                      return r && r.abort(t), i(0, t), this;
                    },
                  };
                if (
                  (v.promise(x),
                  (p.url = ((t || p.url || jt.href) + "").replace(
                    Ut,
                    jt.protocol + "//"
                  )),
                  (p.type = n.method || n.type || p.method || p.type),
                  (p.dataTypes = (p.dataType || "*")
                    .toLowerCase()
                    .match(Ie) || [""]),
                  null == p.crossDomain)
                ) {
                  u = we.createElement("a");
                  try {
                    (u.href = p.url),
                      (u.href = u.href),
                      (p.crossDomain =
                        Xt.protocol + "//" + Xt.host !=
                        u.protocol + "//" + u.host);
                  } catch (e) {
                    p.crossDomain = !0;
                  }
                }
                if (
                  (p.data &&
                    p.processData &&
                    "string" != typeof p.data &&
                    (p.data = Te.param(p.data, p.traditional)),
                  ie(zt, p, n, x),
                  c)
                )
                  return x;
                for (f in ((d = Te.event && p.global) &&
                  0 == Te.active++ &&
                  Te.event.trigger("ajaxStart"),
                (p.type = p.type.toUpperCase()),
                (p.hasContent = !Vt.test(p.type)),
                (o = p.url.replace(Bt, "")),
                p.hasContent
                  ? p.data &&
                    p.processData &&
                    0 ===
                      (p.contentType || "").indexOf(
                        "application/x-www-form-urlencoded"
                      ) &&
                    (p.data = p.data.replace(Rt, "+"))
                  : ((h = p.url.slice(o.length)),
                    p.data &&
                      (p.processData || "string" == typeof p.data) &&
                      ((o += (It.test(o) ? "&" : "?") + p.data), delete p.data),
                    !1 === p.cache &&
                      ((o = o.replace($t, "$1")),
                      (h = (It.test(o) ? "&" : "?") + "_=" + Lt.guid++ + h)),
                    (p.url = o + h)),
                p.ifModified &&
                  (Te.lastModified[o] &&
                    x.setRequestHeader("If-Modified-Since", Te.lastModified[o]),
                  Te.etag[o] &&
                    x.setRequestHeader("If-None-Match", Te.etag[o])),
                ((p.data && p.hasContent && !1 !== p.contentType) ||
                  n.contentType) &&
                  x.setRequestHeader("Content-Type", p.contentType),
                x.setRequestHeader(
                  "Accept",
                  p.dataTypes[0] && p.accepts[p.dataTypes[0]]
                    ? p.accepts[p.dataTypes[0]] +
                        ("*" !== p.dataTypes[0] ? ", " + Qt + "; q=0.01" : "")
                    : p.accepts["*"]
                ),
                p.headers))
                  x.setRequestHeader(f, p.headers[f]);
                if (p.beforeSend && (!1 === p.beforeSend.call(m, x, p) || c))
                  return x.abort();
                if (
                  ((E = "abort"),
                  y.add(p.complete),
                  x.done(p.success),
                  x.fail(p.error),
                  (r = ie(Kt, p, n, x)))
                ) {
                  if (
                    ((x.readyState = 1), d && g.trigger("ajaxSend", [x, p]), c)
                  )
                    return x;
                  p.async &&
                    p.timeout > 0 &&
                    (l = e.setTimeout(function () {
                      x.abort("timeout");
                    }, p.timeout));
                  try {
                    (c = !1), r.send(_, i);
                  } catch (e) {
                    if (c) throw e;
                    i(-1, e);
                  }
                } else i(-1, "No Transport");
                return x;
              },
              getJSON: function (e, t, n) {
                return Te.get(e, t, n, "json");
              },
              getScript: function (e, t) {
                return Te.get(e, void 0, t, "script");
              },
            }),
            Te.each(["get", "post"], function (e, t) {
              Te[t] = function (e, n, i, r) {
                return (
                  be(n) && ((r = r || i), (i = n), (n = void 0)),
                  Te.ajax(
                    Te.extend(
                      { url: e, type: t, dataType: r, data: n, success: i },
                      Te.isPlainObject(e) && e
                    )
                  )
                );
              };
            }),
            Te.ajaxPrefilter(function (e) {
              var t;
              for (t in e.headers)
                "content-type" === t.toLowerCase() &&
                  (e.contentType = e.headers[t] || "");
            }),
            (Te._evalUrl = function (e, t, n) {
              return Te.ajax({
                url: e,
                type: "GET",
                dataType: "script",
                cache: !0,
                async: !1,
                global: !1,
                converters: { "text script": function () {} },
                dataFilter: function (e) {
                  Te.globalEval(e, t, n);
                },
              });
            }),
            Te.fn.extend({
              wrapAll: function (e) {
                var t;
                return (
                  this[0] &&
                    (be(e) && (e = e.call(this[0])),
                    (t = Te(e, this[0].ownerDocument).eq(0).clone(!0)),
                    this[0].parentNode && t.insertBefore(this[0]),
                    t
                      .map(function () {
                        for (var e = this; e.firstElementChild; )
                          e = e.firstElementChild;
                        return e;
                      })
                      .append(this)),
                  this
                );
              },
              wrapInner: function (e) {
                return be(e)
                  ? this.each(function (t) {
                      Te(this).wrapInner(e.call(this, t));
                    })
                  : this.each(function () {
                      var t = Te(this),
                        n = t.contents();
                      n.length ? n.wrapAll(e) : t.append(e);
                    });
              },
              wrap: function (e) {
                var t = be(e);
                return this.each(function (n) {
                  Te(this).wrapAll(t ? e.call(this, n) : e);
                });
              },
              unwrap: function (e) {
                return (
                  this.parent(e)
                    .not("body")
                    .each(function () {
                      Te(this).replaceWith(this.childNodes);
                    }),
                  this
                );
              },
            }),
            (Te.expr.pseudos.hidden = function (e) {
              return !Te.expr.pseudos.visible(e);
            }),
            (Te.expr.pseudos.visible = function (e) {
              return !!(
                e.offsetWidth ||
                e.offsetHeight ||
                e.getClientRects().length
              );
            }),
            (Te.ajaxSettings.xhr = function () {
              try {
                return new e.XMLHttpRequest();
              } catch (e) {}
            });
          var Yt = { 0: 200, 1223: 204 },
            Gt = Te.ajaxSettings.xhr();
          (ye.cors = !!Gt && "withCredentials" in Gt),
            (ye.ajax = Gt = !!Gt),
            Te.ajaxTransport(function (t) {
              var n, i;
              if (ye.cors || (Gt && !t.crossDomain))
                return {
                  send: function (r, o) {
                    var s,
                      a = t.xhr();
                    if (
                      (a.open(t.type, t.url, t.async, t.username, t.password),
                      t.xhrFields)
                    )
                      for (s in t.xhrFields) a[s] = t.xhrFields[s];
                    for (s in (t.mimeType &&
                      a.overrideMimeType &&
                      a.overrideMimeType(t.mimeType),
                    t.crossDomain ||
                      r["X-Requested-With"] ||
                      (r["X-Requested-With"] = "XMLHttpRequest"),
                    r))
                      a.setRequestHeader(s, r[s]);
                    (n = function (e) {
                      return function () {
                        n &&
                          ((n =
                            i =
                            a.onload =
                            a.onerror =
                            a.onabort =
                            a.ontimeout =
                            a.onreadystatechange =
                              null),
                          "abort" === e
                            ? a.abort()
                            : "error" === e
                            ? "number" != typeof a.status
                              ? o(0, "error")
                              : o(a.status, a.statusText)
                            : o(
                                Yt[a.status] || a.status,
                                a.statusText,
                                "text" !== (a.responseType || "text") ||
                                  "string" != typeof a.responseText
                                  ? { binary: a.response }
                                  : { text: a.responseText },
                                a.getAllResponseHeaders()
                              ));
                      };
                    }),
                      (a.onload = n()),
                      (i = a.onerror = a.ontimeout = n("error")),
                      void 0 !== a.onabort
                        ? (a.onabort = i)
                        : (a.onreadystatechange = function () {
                            4 === a.readyState &&
                              e.setTimeout(function () {
                                n && i();
                              });
                          }),
                      (n = n("abort"));
                    try {
                      a.send((t.hasContent && t.data) || null);
                    } catch (e) {
                      if (n) throw e;
                    }
                  },
                  abort: function () {
                    n && n();
                  },
                };
            }),
            Te.ajaxPrefilter(function (e) {
              e.crossDomain && (e.contents.script = !1);
            }),
            Te.ajaxSetup({
              accepts: {
                script:
                  "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript",
              },
              contents: { script: /\b(?:java|ecma)script\b/ },
              converters: {
                "text script": function (e) {
                  return Te.globalEval(e), e;
                },
              },
            }),
            Te.ajaxPrefilter("script", function (e) {
              void 0 === e.cache && (e.cache = !1),
                e.crossDomain && (e.type = "GET");
            }),
            Te.ajaxTransport("script", function (e) {
              var t, n;
              if (e.crossDomain || e.scriptAttrs)
                return {
                  send: function (i, r) {
                    (t = Te("<script>")
                      .attr(e.scriptAttrs || {})
                      .prop({ charset: e.scriptCharset, src: e.url })
                      .on(
                        "load error",
                        (n = function (e) {
                          t.remove(),
                            (n = null),
                            e && r("error" === e.type ? 404 : 200, e.type);
                        })
                      )),
                      we.head.appendChild(t[0]);
                  },
                  abort: function () {
                    n && n();
                  },
                };
            });
          var Jt,
            Zt = [],
            en = /(=)\?(?=&|$)|\?\?/;
          Te.ajaxSetup({
            jsonp: "callback",
            jsonpCallback: function () {
              var e = Zt.pop() || Te.expando + "_" + Lt.guid++;
              return (this[e] = !0), e;
            },
          }),
            Te.ajaxPrefilter("json jsonp", function (t, n, i) {
              var r,
                o,
                s,
                a =
                  !1 !== t.jsonp &&
                  (en.test(t.url)
                    ? "url"
                    : "string" == typeof t.data &&
                      0 ===
                        (t.contentType || "").indexOf(
                          "application/x-www-form-urlencoded"
                        ) &&
                      en.test(t.data) &&
                      "data");
              if (a || "jsonp" === t.dataTypes[0])
                return (
                  (r = t.jsonpCallback =
                    be(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback),
                  a
                    ? (t[a] = t[a].replace(en, "$1" + r))
                    : !1 !== t.jsonp &&
                      (t.url +=
                        (It.test(t.url) ? "&" : "?") + t.jsonp + "=" + r),
                  (t.converters["script json"] = function () {
                    return s || Te.error(r + " was not called"), s[0];
                  }),
                  (t.dataTypes[0] = "json"),
                  (o = e[r]),
                  (e[r] = function () {
                    s = arguments;
                  }),
                  i.always(function () {
                    void 0 === o ? Te(e).removeProp(r) : (e[r] = o),
                      t[r] && ((t.jsonpCallback = n.jsonpCallback), Zt.push(r)),
                      s && be(o) && o(s[0]),
                      (s = o = void 0);
                  }),
                  "script"
                );
            }),
            (ye.createHTMLDocument =
              (((Jt = we.implementation.createHTMLDocument("").body).innerHTML =
                "<form></form><form></form>"),
              2 === Jt.childNodes.length)),
            (Te.parseHTML = function (e, t, n) {
              return "string" != typeof e
                ? []
                : ("boolean" == typeof t && ((n = t), (t = !1)),
                  t ||
                    (ye.createHTMLDocument
                      ? (((i = (t =
                          we.implementation.createHTMLDocument(
                            ""
                          )).createElement("base")).href = we.location.href),
                        t.head.appendChild(i))
                      : (t = we)),
                  (o = !n && []),
                  (r = Ne.exec(e))
                    ? [t.createElement(r[1])]
                    : ((r = x([e], t, o)),
                      o && o.length && Te(o).remove(),
                      Te.merge([], r.childNodes)));
              var i, r, o;
            }),
            (Te.fn.load = function (e, t, n) {
              var i,
                r,
                o,
                s = this,
                a = e.indexOf(" ");
              return (
                a > -1 && ((i = J(e.slice(a))), (e = e.slice(0, a))),
                be(t)
                  ? ((n = t), (t = void 0))
                  : t && "object" == typeof t && (r = "POST"),
                s.length > 0 &&
                  Te.ajax({
                    url: e,
                    type: r || "GET",
                    dataType: "html",
                    data: t,
                  })
                    .done(function (e) {
                      (o = arguments),
                        s.html(
                          i ? Te("<div>").append(Te.parseHTML(e)).find(i) : e
                        );
                    })
                    .always(
                      n &&
                        function (e, t) {
                          s.each(function () {
                            n.apply(this, o || [e.responseText, t, e]);
                          });
                        }
                    ),
                this
              );
            }),
            (Te.expr.pseudos.animated = function (e) {
              return Te.grep(Te.timers, function (t) {
                return e === t.elem;
              }).length;
            }),
            (Te.offset = {
              setOffset: function (e, t, n) {
                var i,
                  r,
                  o,
                  s,
                  a,
                  l,
                  u = Te.css(e, "position"),
                  c = Te(e),
                  d = {};
                "static" === u && (e.style.position = "relative"),
                  (a = c.offset()),
                  (o = Te.css(e, "top")),
                  (l = Te.css(e, "left")),
                  ("absolute" === u || "fixed" === u) &&
                  (o + l).indexOf("auto") > -1
                    ? ((s = (i = c.position()).top), (r = i.left))
                    : ((s = parseFloat(o) || 0), (r = parseFloat(l) || 0)),
                  be(t) && (t = t.call(e, n, Te.extend({}, a))),
                  null != t.top && (d.top = t.top - a.top + s),
                  null != t.left && (d.left = t.left - a.left + r),
                  "using" in t ? t.using.call(e, d) : c.css(d);
              },
            }),
            Te.fn.extend({
              offset: function (e) {
                if (arguments.length)
                  return void 0 === e
                    ? this
                    : this.each(function (t) {
                        Te.offset.setOffset(this, e, t);
                      });
                var t,
                  n,
                  i = this[0];
                return i
                  ? i.getClientRects().length
                    ? ((t = i.getBoundingClientRect()),
                      (n = i.ownerDocument.defaultView),
                      {
                        top: t.top + n.pageYOffset,
                        left: t.left + n.pageXOffset,
                      })
                    : { top: 0, left: 0 }
                  : void 0;
              },
              position: function () {
                if (this[0]) {
                  var e,
                    t,
                    n,
                    i = this[0],
                    r = { top: 0, left: 0 };
                  if ("fixed" === Te.css(i, "position"))
                    t = i.getBoundingClientRect();
                  else {
                    for (
                      t = this.offset(),
                        n = i.ownerDocument,
                        e = i.offsetParent || n.documentElement;
                      e &&
                      (e === n.body || e === n.documentElement) &&
                      "static" === Te.css(e, "position");

                    )
                      e = e.parentNode;
                    e &&
                      e !== i &&
                      1 === e.nodeType &&
                      (((r = Te(e).offset()).top += Te.css(
                        e,
                        "borderTopWidth",
                        !0
                      )),
                      (r.left += Te.css(e, "borderLeftWidth", !0)));
                  }
                  return {
                    top: t.top - r.top - Te.css(i, "marginTop", !0),
                    left: t.left - r.left - Te.css(i, "marginLeft", !0),
                  };
                }
              },
              offsetParent: function () {
                return this.map(function () {
                  for (
                    var e = this.offsetParent;
                    e && "static" === Te.css(e, "position");

                  )
                    e = e.offsetParent;
                  return e || Qe;
                });
              },
            }),
            Te.each(
              { scrollLeft: "pageXOffset", scrollTop: "pageYOffset" },
              function (e, t) {
                var n = "pageYOffset" === t;
                Te.fn[e] = function (i) {
                  return qe(
                    this,
                    function (e, i, r) {
                      var o;
                      if (
                        (_e(e)
                          ? (o = e)
                          : 9 === e.nodeType && (o = e.defaultView),
                        void 0 === r)
                      )
                        return o ? o[t] : e[i];
                      o
                        ? o.scrollTo(
                            n ? o.pageXOffset : r,
                            n ? r : o.pageYOffset
                          )
                        : (e[i] = r);
                    },
                    e,
                    i,
                    arguments.length
                  );
                };
              }
            ),
            Te.each(["top", "left"], function (e, t) {
              Te.cssHooks[t] = P(ye.pixelPosition, function (e, n) {
                if (n)
                  return (
                    (n = q(e, t)), ct.test(n) ? Te(e).position()[t] + "px" : n
                  );
              });
            }),
            Te.each({ Height: "height", Width: "width" }, function (e, t) {
              Te.each(
                { padding: "inner" + e, content: t, "": "outer" + e },
                function (n, i) {
                  Te.fn[i] = function (r, o) {
                    var s = arguments.length && (n || "boolean" != typeof r),
                      a = n || (!0 === r || !0 === o ? "margin" : "border");
                    return qe(
                      this,
                      function (t, n, r) {
                        var o;
                        return _e(t)
                          ? 0 === i.indexOf("outer")
                            ? t["inner" + e]
                            : t.document.documentElement["client" + e]
                          : 9 === t.nodeType
                          ? ((o = t.documentElement),
                            Math.max(
                              t.body["scroll" + e],
                              o["scroll" + e],
                              t.body["offset" + e],
                              o["offset" + e],
                              o["client" + e]
                            ))
                          : void 0 === r
                          ? Te.css(t, n, a)
                          : Te.style(t, n, r, a);
                      },
                      t,
                      s ? r : void 0,
                      s
                    );
                  };
                }
              );
            }),
            Te.each(
              [
                "ajaxStart",
                "ajaxStop",
                "ajaxComplete",
                "ajaxError",
                "ajaxSuccess",
                "ajaxSend",
              ],
              function (e, t) {
                Te.fn[t] = function (e) {
                  return this.on(t, e);
                };
              }
            ),
            Te.fn.extend({
              bind: function (e, t, n) {
                return this.on(e, null, t, n);
              },
              unbind: function (e, t) {
                return this.off(e, null, t);
              },
              delegate: function (e, t, n, i) {
                return this.on(t, e, n, i);
              },
              undelegate: function (e, t, n) {
                return 1 === arguments.length
                  ? this.off(e, "**")
                  : this.off(t, e || "**", n);
              },
              hover: function (e, t) {
                return this.mouseenter(e).mouseleave(t || e);
              },
            }),
            Te.each(
              "blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(
                " "
              ),
              function (e, t) {
                Te.fn[t] = function (e, n) {
                  return arguments.length > 0
                    ? this.on(t, null, e, n)
                    : this.trigger(t);
                };
              }
            );
          var tn = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
          (Te.proxy = function (e, t) {
            var n, i, r;
            if (("string" == typeof t && ((n = e[t]), (t = e), (e = n)), be(e)))
              return (
                (i = ue.call(arguments, 2)),
                (r = function () {
                  return e.apply(t || this, i.concat(ue.call(arguments)));
                }),
                (r.guid = e.guid = e.guid || Te.guid++),
                r
              );
          }),
            (Te.holdReady = function (e) {
              e ? Te.readyWait++ : Te.ready(!0);
            }),
            (Te.isArray = Array.isArray),
            (Te.parseJSON = JSON.parse),
            (Te.nodeName = o),
            (Te.isFunction = be),
            (Te.isWindow = _e),
            (Te.camelCase = p),
            (Te.type = i),
            (Te.now = Date.now),
            (Te.isNumeric = function (e) {
              var t = Te.type(e);
              return (
                ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
              );
            }),
            (Te.trim = function (e) {
              return null == e ? "" : (e + "").replace(tn, "");
            }),
            "function" == typeof define &&
              define.amd &&
              define("jquery", [], function () {
                return Te;
              });
          var nn = e.jQuery,
            rn = e.$;
          return (
            (Te.noConflict = function (t) {
              return (
                e.$ === Te && (e.$ = rn),
                t && e.jQuery === Te && (e.jQuery = nn),
                Te
              );
            }),
            void 0 === t && (e.jQuery = e.$ = Te),
            Te
          );
        });
      },
    }),
    De = ke({
      "node_modules/popper.js/dist/umd/popper.js"(e, t) {
        var n, i;
        (n = e),
          (i = function () {
            "use strict";
            function e(e) {
              var t = !1;
              return function () {
                t ||
                  ((t = !0),
                  window.Promise.resolve().then(function () {
                    (t = !1), e();
                  }));
              };
            }
            function t(e) {
              var t = !1;
              return function () {
                t ||
                  ((t = !0),
                  setTimeout(function () {
                    (t = !1), e();
                  }, ce));
              };
            }
            function n(e) {
              return e && "[object Function]" === {}.toString.call(e);
            }
            function i(e, t) {
              if (1 !== e.nodeType) return [];
              var n = e.ownerDocument.defaultView.getComputedStyle(e, null);
              return t ? n[t] : n;
            }
            function r(e) {
              return "HTML" === e.nodeName ? e : e.parentNode || e.host;
            }
            function o(e) {
              if (!e) return document.body;
              switch (e.nodeName) {
                case "HTML":
                case "BODY":
                  return e.ownerDocument.body;
                case "#document":
                  return e.body;
              }
              var t = i(e),
                n = t.overflow,
                s = t.overflowX,
                a = t.overflowY;
              return /(auto|scroll|overlay)/.test(n + a + s) ? e : o(r(e));
            }
            function s(e) {
              return e && e.referenceNode ? e.referenceNode : e;
            }
            function a(e) {
              return 11 === e ? fe : 10 === e ? he : fe || he;
            }
            function l(e) {
              if (!e) return document.documentElement;
              for (
                var t = a(10) ? document.body : null,
                  n = e.offsetParent || null;
                n === t && e.nextElementSibling;

              )
                n = (e = e.nextElementSibling).offsetParent;
              var r = n && n.nodeName;
              return r && "BODY" !== r && "HTML" !== r
                ? -1 !== ["TH", "TD", "TABLE"].indexOf(n.nodeName) &&
                  "static" === i(n, "position")
                  ? l(n)
                  : n
                : e
                ? e.ownerDocument.documentElement
                : document.documentElement;
            }
            function u(e) {
              var t = e.nodeName;
              return (
                "BODY" !== t && ("HTML" === t || l(e.firstElementChild) === e)
              );
            }
            function c(e) {
              return null !== e.parentNode ? c(e.parentNode) : e;
            }
            function d(e, t) {
              if (!(e && e.nodeType && t && t.nodeType))
                return document.documentElement;
              var n =
                  e.compareDocumentPosition(t) &
                  Node.DOCUMENT_POSITION_FOLLOWING,
                i = n ? e : t,
                r = n ? t : e,
                o = document.createRange();
              o.setStart(i, 0), o.setEnd(r, 0);
              var s = o.commonAncestorContainer;
              if ((e !== s && t !== s) || i.contains(r)) return u(s) ? s : l(s);
              var a = c(e);
              return a.host ? d(a.host, t) : d(e, c(t).host);
            }
            function f(e) {
              var t =
                  "top" ===
                  (arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : "top")
                    ? "scrollTop"
                    : "scrollLeft",
                n = e.nodeName;
              if ("BODY" === n || "HTML" === n) {
                var i = e.ownerDocument.documentElement;
                return (e.ownerDocument.scrollingElement || i)[t];
              }
              return e[t];
            }
            function h(e, t) {
              var n =
                  arguments.length > 2 &&
                  void 0 !== arguments[2] &&
                  arguments[2],
                i = f(t, "top"),
                r = f(t, "left"),
                o = n ? -1 : 1;
              return (
                (e.top += i * o),
                (e.bottom += i * o),
                (e.left += r * o),
                (e.right += r * o),
                e
              );
            }
            function p(e, t) {
              var n = "x" === t ? "Left" : "Top",
                i = "Left" === n ? "Right" : "Bottom";
              return (
                parseFloat(e["border" + n + "Width"]) +
                parseFloat(e["border" + i + "Width"])
              );
            }
            function m(e, t, n, i) {
              return Math.max(
                t["offset" + e],
                t["scroll" + e],
                n["client" + e],
                n["offset" + e],
                n["scroll" + e],
                a(10)
                  ? parseInt(n["offset" + e]) +
                      parseInt(
                        i["margin" + ("Height" === e ? "Top" : "Left")]
                      ) +
                      parseInt(
                        i["margin" + ("Height" === e ? "Bottom" : "Right")]
                      )
                  : 0
              );
            }
            function g(e) {
              var t = e.body,
                n = e.documentElement,
                i = a(10) && getComputedStyle(n);
              return {
                height: m("Height", t, n, i),
                width: m("Width", t, n, i),
              };
            }
            function v(e) {
              return ve({}, e, {
                right: e.left + e.width,
                bottom: e.top + e.height,
              });
            }
            function y(e) {
              var t = {};
              try {
                if (a(10)) {
                  t = e.getBoundingClientRect();
                  var n = f(e, "top"),
                    r = f(e, "left");
                  (t.top += n), (t.left += r), (t.bottom += n), (t.right += r);
                } else t = e.getBoundingClientRect();
              } catch (e) {}
              var o = {
                  left: t.left,
                  top: t.top,
                  width: t.right - t.left,
                  height: t.bottom - t.top,
                },
                s = "HTML" === e.nodeName ? g(e.ownerDocument) : {},
                l = s.width || e.clientWidth || o.width,
                u = s.height || e.clientHeight || o.height,
                c = e.offsetWidth - l,
                d = e.offsetHeight - u;
              if (c || d) {
                var h = i(e);
                (c -= p(h, "x")),
                  (d -= p(h, "y")),
                  (o.width -= c),
                  (o.height -= d);
              }
              return v(o);
            }
            function b(e, t) {
              var n =
                  arguments.length > 2 &&
                  void 0 !== arguments[2] &&
                  arguments[2],
                r = a(10),
                s = "HTML" === t.nodeName,
                l = y(e),
                u = y(t),
                c = o(e),
                d = i(t),
                f = parseFloat(d.borderTopWidth),
                p = parseFloat(d.borderLeftWidth);
              n &&
                s &&
                ((u.top = Math.max(u.top, 0)), (u.left = Math.max(u.left, 0)));
              var m = v({
                top: l.top - u.top - f,
                left: l.left - u.left - p,
                width: l.width,
                height: l.height,
              });
              if (((m.marginTop = 0), (m.marginLeft = 0), !r && s)) {
                var g = parseFloat(d.marginTop),
                  b = parseFloat(d.marginLeft);
                (m.top -= f - g),
                  (m.bottom -= f - g),
                  (m.left -= p - b),
                  (m.right -= p - b),
                  (m.marginTop = g),
                  (m.marginLeft = b);
              }
              return (
                (r && !n ? t.contains(c) : t === c && "BODY" !== c.nodeName) &&
                  (m = h(m, t)),
                m
              );
            }
            function _(e) {
              var t =
                  arguments.length > 1 &&
                  void 0 !== arguments[1] &&
                  arguments[1],
                n = e.ownerDocument.documentElement,
                i = b(e, n),
                r = Math.max(n.clientWidth, window.innerWidth || 0),
                o = Math.max(n.clientHeight, window.innerHeight || 0),
                s = t ? 0 : f(n),
                a = t ? 0 : f(n, "left");
              return v({
                top: s - i.top + i.marginTop,
                left: a - i.left + i.marginLeft,
                width: r,
                height: o,
              });
            }
            function w(e) {
              var t = e.nodeName;
              if ("BODY" === t || "HTML" === t) return !1;
              if ("fixed" === i(e, "position")) return !0;
              var n = r(e);
              return !!n && w(n);
            }
            function E(e) {
              if (!e || !e.parentElement || a())
                return document.documentElement;
              for (var t = e.parentElement; t && "none" === i(t, "transform"); )
                t = t.parentElement;
              return t || document.documentElement;
            }
            function x(e, t, n, i) {
              var a =
                  arguments.length > 4 &&
                  void 0 !== arguments[4] &&
                  arguments[4],
                l = { top: 0, left: 0 },
                u = a ? E(e) : d(e, s(t));
              if ("viewport" === i) l = _(u, a);
              else {
                var c = void 0;
                "scrollParent" === i
                  ? "BODY" === (c = o(r(t))).nodeName &&
                    (c = e.ownerDocument.documentElement)
                  : (c = "window" === i ? e.ownerDocument.documentElement : i);
                var f = b(c, u, a);
                if ("HTML" !== c.nodeName || w(u)) l = f;
                else {
                  var h = g(e.ownerDocument),
                    p = h.height,
                    m = h.width;
                  (l.top += f.top - f.marginTop),
                    (l.bottom = p + f.top),
                    (l.left += f.left - f.marginLeft),
                    (l.right = m + f.left);
                }
              }
              var v = "number" == typeof (n = n || 0);
              return (
                (l.left += v ? n : n.left || 0),
                (l.top += v ? n : n.top || 0),
                (l.right -= v ? n : n.right || 0),
                (l.bottom -= v ? n : n.bottom || 0),
                l
              );
            }
            function T(e) {
              return e.width * e.height;
            }
            function C(e, t, n, i, r) {
              var o =
                arguments.length > 5 && void 0 !== arguments[5]
                  ? arguments[5]
                  : 0;
              if (-1 === e.indexOf("auto")) return e;
              var s = x(n, i, o, r),
                a = {
                  top: { width: s.width, height: t.top - s.top },
                  right: { width: s.right - t.right, height: s.height },
                  bottom: { width: s.width, height: s.bottom - t.bottom },
                  left: { width: t.left - s.left, height: s.height },
                },
                l = Object.keys(a)
                  .map(function (e) {
                    return ve({ key: e }, a[e], { area: T(a[e]) });
                  })
                  .sort(function (e, t) {
                    return t.area - e.area;
                  }),
                u = l.filter(function (e) {
                  var t = e.width,
                    i = e.height;
                  return t >= n.clientWidth && i >= n.clientHeight;
                }),
                c = u.length > 0 ? u[0].key : l[0].key,
                d = e.split("-")[1];
              return c + (d ? "-" + d : "");
            }
            function A(e, t, n) {
              var i =
                arguments.length > 3 && void 0 !== arguments[3]
                  ? arguments[3]
                  : null;
              return b(n, i ? E(t) : d(t, s(n)), i);
            }
            function k(e) {
              var t = e.ownerDocument.defaultView.getComputedStyle(e),
                n =
                  parseFloat(t.marginTop || 0) +
                  parseFloat(t.marginBottom || 0),
                i =
                  parseFloat(t.marginLeft || 0) +
                  parseFloat(t.marginRight || 0);
              return { width: e.offsetWidth + i, height: e.offsetHeight + n };
            }
            function S(e) {
              var t = {
                left: "right",
                right: "left",
                bottom: "top",
                top: "bottom",
              };
              return e.replace(/left|right|bottom|top/g, function (e) {
                return t[e];
              });
            }
            function N(e, t, n) {
              n = n.split("-")[0];
              var i = k(e),
                r = { width: i.width, height: i.height },
                o = -1 !== ["right", "left"].indexOf(n),
                s = o ? "top" : "left",
                a = o ? "left" : "top",
                l = o ? "height" : "width",
                u = o ? "width" : "height";
              return (
                (r[s] = t[s] + t[l] / 2 - i[l] / 2),
                (r[a] = n === a ? t[a] - i[u] : t[S(a)]),
                r
              );
            }
            function O(e, t) {
              return Array.prototype.find ? e.find(t) : e.filter(t)[0];
            }
            function D(e, t, n) {
              if (Array.prototype.findIndex)
                return e.findIndex(function (e) {
                  return e[t] === n;
                });
              var i = O(e, function (e) {
                return e[t] === n;
              });
              return e.indexOf(i);
            }
            function j(e, t, i) {
              return (
                (void 0 === i ? e : e.slice(0, D(e, "name", i))).forEach(
                  function (e) {
                    e.function &&
                      console.warn(
                        "`modifier.function` is deprecated, use `modifier.fn`!"
                      );
                    var i = e.function || e.fn;
                    e.enabled &&
                      n(i) &&
                      ((t.offsets.popper = v(t.offsets.popper)),
                      (t.offsets.reference = v(t.offsets.reference)),
                      (t = i(t, e)));
                  }
                ),
                t
              );
            }
            function L() {
              if (!this.state.isDestroyed) {
                var e = {
                  instance: this,
                  styles: {},
                  arrowStyles: {},
                  attributes: {},
                  flipped: !1,
                  offsets: {},
                };
                (e.offsets.reference = A(
                  this.state,
                  this.popper,
                  this.reference,
                  this.options.positionFixed
                )),
                  (e.placement = C(
                    this.options.placement,
                    e.offsets.reference,
                    this.popper,
                    this.reference,
                    this.options.modifiers.flip.boundariesElement,
                    this.options.modifiers.flip.padding
                  )),
                  (e.originalPlacement = e.placement),
                  (e.positionFixed = this.options.positionFixed),
                  (e.offsets.popper = N(
                    this.popper,
                    e.offsets.reference,
                    e.placement
                  )),
                  (e.offsets.popper.position = this.options.positionFixed
                    ? "fixed"
                    : "absolute"),
                  (e = j(this.modifiers, e)),
                  this.state.isCreated
                    ? this.options.onUpdate(e)
                    : ((this.state.isCreated = !0), this.options.onCreate(e));
              }
            }
            function I(e, t) {
              return e.some(function (e) {
                var n = e.name;
                return e.enabled && n === t;
              });
            }
            function M(e) {
              for (
                var t = [!1, "ms", "Webkit", "Moz", "O"],
                  n = e.charAt(0).toUpperCase() + e.slice(1),
                  i = 0;
                i < t.length;
                i++
              ) {
                var r = t[i],
                  o = r ? "" + r + n : e;
                if (void 0 !== document.body.style[o]) return o;
              }
              return null;
            }
            function F() {
              return (
                (this.state.isDestroyed = !0),
                I(this.modifiers, "applyStyle") &&
                  (this.popper.removeAttribute("x-placement"),
                  (this.popper.style.position = ""),
                  (this.popper.style.top = ""),
                  (this.popper.style.left = ""),
                  (this.popper.style.right = ""),
                  (this.popper.style.bottom = ""),
                  (this.popper.style.willChange = ""),
                  (this.popper.style[M("transform")] = "")),
                this.disableEventListeners(),
                this.options.removeOnDestroy &&
                  this.popper.parentNode.removeChild(this.popper),
                this
              );
            }
            function q(e) {
              var t = e.ownerDocument;
              return t ? t.defaultView : window;
            }
            function P(e, t, n, i) {
              var r = "BODY" === e.nodeName,
                s = r ? e.ownerDocument.defaultView : e;
              s.addEventListener(t, n, { passive: !0 }),
                r || P(o(s.parentNode), t, n, i),
                i.push(s);
            }
            function R(e, t, n, i) {
              (n.updateBound = i),
                q(e).addEventListener("resize", n.updateBound, { passive: !0 });
              var r = o(e);
              return (
                P(r, "scroll", n.updateBound, n.scrollParents),
                (n.scrollElement = r),
                (n.eventsEnabled = !0),
                n
              );
            }
            function B() {
              this.state.eventsEnabled ||
                (this.state = R(
                  this.reference,
                  this.options,
                  this.state,
                  this.scheduleUpdate
                ));
            }
            function $(e, t) {
              return (
                q(e).removeEventListener("resize", t.updateBound),
                t.scrollParents.forEach(function (e) {
                  e.removeEventListener("scroll", t.updateBound);
                }),
                (t.updateBound = null),
                (t.scrollParents = []),
                (t.scrollElement = null),
                (t.eventsEnabled = !1),
                t
              );
            }
            function H() {
              this.state.eventsEnabled &&
                (cancelAnimationFrame(this.scheduleUpdate),
                (this.state = $(this.reference, this.state)));
            }
            function W(e) {
              return "" !== e && !isNaN(parseFloat(e)) && isFinite(e);
            }
            function V(e, t) {
              Object.keys(t).forEach(function (n) {
                var i = "";
                -1 !==
                  ["width", "height", "top", "right", "bottom", "left"].indexOf(
                    n
                  ) &&
                  W(t[n]) &&
                  (i = "px"),
                  (e.style[n] = t[n] + i);
              });
            }
            function U(e, t) {
              Object.keys(t).forEach(function (n) {
                !1 !== t[n] ? e.setAttribute(n, t[n]) : e.removeAttribute(n);
              });
            }
            function z(e) {
              return (
                V(e.instance.popper, e.styles),
                U(e.instance.popper, e.attributes),
                e.arrowElement &&
                  Object.keys(e.arrowStyles).length &&
                  V(e.arrowElement, e.arrowStyles),
                e
              );
            }
            function K(e, t, n, i, r) {
              var o = A(r, t, e, n.positionFixed),
                s = C(
                  n.placement,
                  o,
                  t,
                  e,
                  n.modifiers.flip.boundariesElement,
                  n.modifiers.flip.padding
                );
              return (
                t.setAttribute("x-placement", s),
                V(t, { position: n.positionFixed ? "fixed" : "absolute" }),
                n
              );
            }
            function Q(e, t) {
              var n = e.offsets,
                i = n.popper,
                r = n.reference,
                o = Math.round,
                s = Math.floor,
                a = function (e) {
                  return e;
                },
                l = o(r.width),
                u = o(i.width),
                c = -1 !== ["left", "right"].indexOf(e.placement),
                d = -1 !== e.placement.indexOf("-"),
                f = t ? (c || d || l % 2 == u % 2 ? o : s) : a,
                h = t ? o : a;
              return {
                left: f(
                  l % 2 == 1 && u % 2 == 1 && !d && t ? i.left - 1 : i.left
                ),
                top: h(i.top),
                bottom: h(i.bottom),
                right: f(i.right),
              };
            }
            function X(e, t) {
              var n = t.x,
                i = t.y,
                r = e.offsets.popper,
                o = O(e.instance.modifiers, function (e) {
                  return "applyStyle" === e.name;
                }).gpuAcceleration;
              void 0 !== o &&
                console.warn(
                  "WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!"
                );
              var s = void 0 !== o ? o : t.gpuAcceleration,
                a = l(e.instance.popper),
                u = y(a),
                c = { position: r.position },
                d = Q(e, window.devicePixelRatio < 2 || !ye),
                f = "bottom" === n ? "top" : "bottom",
                h = "right" === i ? "left" : "right",
                p = M("transform"),
                m = void 0,
                g = void 0;
              if (
                ((g =
                  "bottom" === f
                    ? "HTML" === a.nodeName
                      ? -a.clientHeight + d.bottom
                      : -u.height + d.bottom
                    : d.top),
                (m =
                  "right" === h
                    ? "HTML" === a.nodeName
                      ? -a.clientWidth + d.right
                      : -u.width + d.right
                    : d.left),
                s && p)
              )
                (c[p] = "translate3d(" + m + "px, " + g + "px, 0)"),
                  (c[f] = 0),
                  (c[h] = 0),
                  (c.willChange = "transform");
              else {
                var v = "bottom" === f ? -1 : 1,
                  b = "right" === h ? -1 : 1;
                (c[f] = g * v), (c[h] = m * b), (c.willChange = f + ", " + h);
              }
              var _ = { "x-placement": e.placement };
              return (
                (e.attributes = ve({}, _, e.attributes)),
                (e.styles = ve({}, c, e.styles)),
                (e.arrowStyles = ve({}, e.offsets.arrow, e.arrowStyles)),
                e
              );
            }
            function Y(e, t, n) {
              var i = O(e, function (e) {
                  return e.name === t;
                }),
                r =
                  !!i &&
                  e.some(function (e) {
                    return e.name === n && e.enabled && e.order < i.order;
                  });
              if (!r) {
                var o = "`" + t + "`",
                  s = "`" + n + "`";
                console.warn(
                  s +
                    " modifier is required by " +
                    o +
                    " modifier in order to work, be sure to include it before " +
                    o +
                    "!"
                );
              }
              return r;
            }
            function G(e, t) {
              var n;
              if (!Y(e.instance.modifiers, "arrow", "keepTogether")) return e;
              var r = t.element;
              if ("string" == typeof r) {
                if (!(r = e.instance.popper.querySelector(r))) return e;
              } else if (!e.instance.popper.contains(r))
                return (
                  console.warn(
                    "WARNING: `arrow.element` must be child of its popper element!"
                  ),
                  e
                );
              var o = e.placement.split("-")[0],
                s = e.offsets,
                a = s.popper,
                l = s.reference,
                u = -1 !== ["left", "right"].indexOf(o),
                c = u ? "height" : "width",
                d = u ? "Top" : "Left",
                f = d.toLowerCase(),
                h = u ? "left" : "top",
                p = u ? "bottom" : "right",
                m = k(r)[c];
              l[p] - m < a[f] && (e.offsets.popper[f] -= a[f] - (l[p] - m)),
                l[f] + m > a[p] && (e.offsets.popper[f] += l[f] + m - a[p]),
                (e.offsets.popper = v(e.offsets.popper));
              var g = l[f] + l[c] / 2 - m / 2,
                y = i(e.instance.popper),
                b = parseFloat(y["margin" + d]),
                _ = parseFloat(y["border" + d + "Width"]),
                w = g - e.offsets.popper[f] - b - _;
              return (
                (w = Math.max(Math.min(a[c] - m, w), 0)),
                (e.arrowElement = r),
                (e.offsets.arrow =
                  (ge((n = {}), f, Math.round(w)), ge(n, h, ""), n)),
                e
              );
            }
            function J(e) {
              return "end" === e ? "start" : "start" === e ? "end" : e;
            }
            function Z(e) {
              var t =
                  arguments.length > 1 &&
                  void 0 !== arguments[1] &&
                  arguments[1],
                n = _e.indexOf(e),
                i = _e.slice(n + 1).concat(_e.slice(0, n));
              return t ? i.reverse() : i;
            }
            function ee(e, t) {
              if (I(e.instance.modifiers, "inner")) return e;
              if (e.flipped && e.placement === e.originalPlacement) return e;
              var n = x(
                  e.instance.popper,
                  e.instance.reference,
                  t.padding,
                  t.boundariesElement,
                  e.positionFixed
                ),
                i = e.placement.split("-")[0],
                r = S(i),
                o = e.placement.split("-")[1] || "",
                s = [];
              switch (t.behavior) {
                case we.FLIP:
                  s = [i, r];
                  break;
                case we.CLOCKWISE:
                  s = Z(i);
                  break;
                case we.COUNTERCLOCKWISE:
                  s = Z(i, !0);
                  break;
                default:
                  s = t.behavior;
              }
              return (
                s.forEach(function (a, l) {
                  if (i !== a || s.length === l + 1) return e;
                  (i = e.placement.split("-")[0]), (r = S(i));
                  var u = e.offsets.popper,
                    c = e.offsets.reference,
                    d = Math.floor,
                    f =
                      ("left" === i && d(u.right) > d(c.left)) ||
                      ("right" === i && d(u.left) < d(c.right)) ||
                      ("top" === i && d(u.bottom) > d(c.top)) ||
                      ("bottom" === i && d(u.top) < d(c.bottom)),
                    h = d(u.left) < d(n.left),
                    p = d(u.right) > d(n.right),
                    m = d(u.top) < d(n.top),
                    g = d(u.bottom) > d(n.bottom),
                    v =
                      ("left" === i && h) ||
                      ("right" === i && p) ||
                      ("top" === i && m) ||
                      ("bottom" === i && g),
                    y = -1 !== ["top", "bottom"].indexOf(i),
                    b =
                      !!t.flipVariations &&
                      ((y && "start" === o && h) ||
                        (y && "end" === o && p) ||
                        (!y && "start" === o && m) ||
                        (!y && "end" === o && g)),
                    _ =
                      !!t.flipVariationsByContent &&
                      ((y && "start" === o && p) ||
                        (y && "end" === o && h) ||
                        (!y && "start" === o && g) ||
                        (!y && "end" === o && m)),
                    w = b || _;
                  (f || v || w) &&
                    ((e.flipped = !0),
                    (f || v) && (i = s[l + 1]),
                    w && (o = J(o)),
                    (e.placement = i + (o ? "-" + o : "")),
                    (e.offsets.popper = ve(
                      {},
                      e.offsets.popper,
                      N(e.instance.popper, e.offsets.reference, e.placement)
                    )),
                    (e = j(e.instance.modifiers, e, "flip")));
                }),
                e
              );
            }
            function te(e) {
              var t = e.offsets,
                n = t.popper,
                i = t.reference,
                r = e.placement.split("-")[0],
                o = Math.floor,
                s = -1 !== ["top", "bottom"].indexOf(r),
                a = s ? "right" : "bottom",
                l = s ? "left" : "top",
                u = s ? "width" : "height";
              return (
                n[a] < o(i[l]) && (e.offsets.popper[l] = o(i[l]) - n[u]),
                n[l] > o(i[a]) && (e.offsets.popper[l] = o(i[a])),
                e
              );
            }
            function ne(e, t, n, i) {
              var r = e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
                o = +r[1],
                s = r[2];
              if (!o) return e;
              if (0 === s.indexOf("%")) {
                return (v("%p" === s ? n : i)[t] / 100) * o;
              }
              return "vh" === s || "vw" === s
                ? (("vh" === s
                    ? Math.max(
                        document.documentElement.clientHeight,
                        window.innerHeight || 0
                      )
                    : Math.max(
                        document.documentElement.clientWidth,
                        window.innerWidth || 0
                      )) /
                    100) *
                    o
                : o;
            }
            function ie(e, t, n, i) {
              var r = [0, 0],
                o = -1 !== ["right", "left"].indexOf(i),
                s = e.split(/(\+|\-)/).map(function (e) {
                  return e.trim();
                }),
                a = s.indexOf(
                  O(s, function (e) {
                    return -1 !== e.search(/,|\s/);
                  })
                );
              s[a] &&
                -1 === s[a].indexOf(",") &&
                console.warn(
                  "Offsets separated by white space(s) are deprecated, use a comma (,) instead."
                );
              var l = /\s*,\s*|\s+/,
                u =
                  -1 !== a
                    ? [
                        s.slice(0, a).concat([s[a].split(l)[0]]),
                        [s[a].split(l)[1]].concat(s.slice(a + 1)),
                      ]
                    : [s];
              return (
                (u = u.map(function (e, i) {
                  var r = (1 === i ? !o : o) ? "height" : "width",
                    s = !1;
                  return e
                    .reduce(function (e, t) {
                      return "" === e[e.length - 1] &&
                        -1 !== ["+", "-"].indexOf(t)
                        ? ((e[e.length - 1] = t), (s = !0), e)
                        : s
                        ? ((e[e.length - 1] += t), (s = !1), e)
                        : e.concat(t);
                    }, [])
                    .map(function (e) {
                      return ne(e, r, t, n);
                    });
                })).forEach(function (e, t) {
                  e.forEach(function (n, i) {
                    W(n) && (r[t] += n * ("-" === e[i - 1] ? -1 : 1));
                  });
                }),
                r
              );
            }
            function re(e, t) {
              var n = t.offset,
                i = e.placement,
                r = e.offsets,
                o = r.popper,
                s = r.reference,
                a = i.split("-")[0],
                l = void 0;
              return (
                (l = W(+n) ? [+n, 0] : ie(n, o, s, a)),
                "left" === a
                  ? ((o.top += l[0]), (o.left -= l[1]))
                  : "right" === a
                  ? ((o.top += l[0]), (o.left += l[1]))
                  : "top" === a
                  ? ((o.left += l[0]), (o.top -= l[1]))
                  : "bottom" === a && ((o.left += l[0]), (o.top += l[1])),
                (e.popper = o),
                e
              );
            }
            function oe(e, t) {
              var n = t.boundariesElement || l(e.instance.popper);
              e.instance.reference === n && (n = l(n));
              var i = M("transform"),
                r = e.instance.popper.style,
                o = r.top,
                s = r.left,
                a = r[i];
              (r.top = ""), (r.left = ""), (r[i] = "");
              var u = x(
                e.instance.popper,
                e.instance.reference,
                t.padding,
                n,
                e.positionFixed
              );
              (r.top = o), (r.left = s), (r[i] = a), (t.boundaries = u);
              var c = t.priority,
                d = e.offsets.popper,
                f = {
                  primary: function (e) {
                    var n = d[e];
                    return (
                      d[e] < u[e] &&
                        !t.escapeWithReference &&
                        (n = Math.max(d[e], u[e])),
                      ge({}, e, n)
                    );
                  },
                  secondary: function (e) {
                    var n = "right" === e ? "left" : "top",
                      i = d[n];
                    return (
                      d[e] > u[e] &&
                        !t.escapeWithReference &&
                        (i = Math.min(
                          d[n],
                          u[e] - ("right" === e ? d.width : d.height)
                        )),
                      ge({}, n, i)
                    );
                  },
                };
              return (
                c.forEach(function (e) {
                  var t =
                    -1 !== ["left", "top"].indexOf(e) ? "primary" : "secondary";
                  d = ve({}, d, f[t](e));
                }),
                (e.offsets.popper = d),
                e
              );
            }
            function se(e) {
              var t = e.placement,
                n = t.split("-")[0],
                i = t.split("-")[1];
              if (i) {
                var r = e.offsets,
                  o = r.reference,
                  s = r.popper,
                  a = -1 !== ["bottom", "top"].indexOf(n),
                  l = a ? "left" : "top",
                  u = a ? "width" : "height",
                  c = {
                    start: ge({}, l, o[l]),
                    end: ge({}, l, o[l] + o[u] - s[u]),
                  };
                e.offsets.popper = ve({}, s, c[i]);
              }
              return e;
            }
            function ae(e) {
              if (!Y(e.instance.modifiers, "hide", "preventOverflow")) return e;
              var t = e.offsets.reference,
                n = O(e.instance.modifiers, function (e) {
                  return "preventOverflow" === e.name;
                }).boundaries;
              if (
                t.bottom < n.top ||
                t.left > n.right ||
                t.top > n.bottom ||
                t.right < n.left
              ) {
                if (!0 === e.hide) return e;
                (e.hide = !0), (e.attributes["x-out-of-boundaries"] = "");
              } else {
                if (!1 === e.hide) return e;
                (e.hide = !1), (e.attributes["x-out-of-boundaries"] = !1);
              }
              return e;
            }
            function le(e) {
              var t = e.placement,
                n = t.split("-")[0],
                i = e.offsets,
                r = i.popper,
                o = i.reference,
                s = -1 !== ["left", "right"].indexOf(n),
                a = -1 === ["top", "left"].indexOf(n);
              return (
                (r[s ? "left" : "top"] =
                  o[n] - (a ? r[s ? "width" : "height"] : 0)),
                (e.placement = S(t)),
                (e.offsets.popper = v(r)),
                e
              );
            }
            var ue =
                "undefined" != typeof window &&
                "undefined" != typeof document &&
                "undefined" != typeof navigator,
              ce = (function () {
                for (
                  var e = ["Edge", "Trident", "Firefox"], t = 0;
                  t < e.length;
                  t += 1
                )
                  if (ue && navigator.userAgent.indexOf(e[t]) >= 0) return 1;
                return 0;
              })(),
              de = ue && window.Promise ? e : t,
              fe =
                ue && !(!window.MSInputMethodContext || !document.documentMode),
              he = ue && /MSIE 10/.test(navigator.userAgent),
              pe = function (e, t) {
                if (!(e instanceof t))
                  throw new TypeError("Cannot call a class as a function");
              },
              me = (function () {
                function e(e, t) {
                  for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    (i.enumerable = i.enumerable || !1),
                      (i.configurable = !0),
                      "value" in i && (i.writable = !0),
                      Object.defineProperty(e, i.key, i);
                  }
                }
                return function (t, n, i) {
                  return n && e(t.prototype, n), i && e(t, i), t;
                };
              })(),
              ge = function (e, t, n) {
                return (
                  t in e
                    ? Object.defineProperty(e, t, {
                        value: n,
                        enumerable: !0,
                        configurable: !0,
                        writable: !0,
                      })
                    : (e[t] = n),
                  e
                );
              },
              ve =
                Object.assign ||
                function (e) {
                  for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var i in n)
                      Object.prototype.hasOwnProperty.call(n, i) &&
                        (e[i] = n[i]);
                  }
                  return e;
                },
              ye = ue && /Firefox/i.test(navigator.userAgent),
              be = [
                "auto-start",
                "auto",
                "auto-end",
                "top-start",
                "top",
                "top-end",
                "right-start",
                "right",
                "right-end",
                "bottom-end",
                "bottom",
                "bottom-start",
                "left-end",
                "left",
                "left-start",
              ],
              _e = be.slice(3),
              we = {
                FLIP: "flip",
                CLOCKWISE: "clockwise",
                COUNTERCLOCKWISE: "counterclockwise",
              },
              Ee = {
                placement: "bottom",
                positionFixed: !1,
                eventsEnabled: !0,
                removeOnDestroy: !1,
                onCreate: function () {},
                onUpdate: function () {},
                modifiers: {
                  shift: { order: 100, enabled: !0, fn: se },
                  offset: { order: 200, enabled: !0, fn: re, offset: 0 },
                  preventOverflow: {
                    order: 300,
                    enabled: !0,
                    fn: oe,
                    priority: ["left", "right", "top", "bottom"],
                    padding: 5,
                    boundariesElement: "scrollParent",
                  },
                  keepTogether: { order: 400, enabled: !0, fn: te },
                  arrow: {
                    order: 500,
                    enabled: !0,
                    fn: G,
                    element: "[x-arrow]",
                  },
                  flip: {
                    order: 600,
                    enabled: !0,
                    fn: ee,
                    behavior: "flip",
                    padding: 5,
                    boundariesElement: "viewport",
                    flipVariations: !1,
                    flipVariationsByContent: !1,
                  },
                  inner: { order: 700, enabled: !1, fn: le },
                  hide: { order: 800, enabled: !0, fn: ae },
                  computeStyle: {
                    order: 850,
                    enabled: !0,
                    fn: X,
                    gpuAcceleration: !0,
                    x: "bottom",
                    y: "right",
                  },
                  applyStyle: {
                    order: 900,
                    enabled: !0,
                    fn: z,
                    onLoad: K,
                    gpuAcceleration: void 0,
                  },
                },
              },
              xe = (function () {
                function e(t, i) {
                  var r = this,
                    o =
                      arguments.length > 2 && void 0 !== arguments[2]
                        ? arguments[2]
                        : {};
                  pe(this, e),
                    (this.scheduleUpdate = function () {
                      return requestAnimationFrame(r.update);
                    }),
                    (this.update = de(this.update.bind(this))),
                    (this.options = ve({}, e.Defaults, o)),
                    (this.state = {
                      isDestroyed: !1,
                      isCreated: !1,
                      scrollParents: [],
                    }),
                    (this.reference = t && t.jquery ? t[0] : t),
                    (this.popper = i && i.jquery ? i[0] : i),
                    (this.options.modifiers = {}),
                    Object.keys(
                      ve({}, e.Defaults.modifiers, o.modifiers)
                    ).forEach(function (t) {
                      r.options.modifiers[t] = ve(
                        {},
                        e.Defaults.modifiers[t] || {},
                        o.modifiers ? o.modifiers[t] : {}
                      );
                    }),
                    (this.modifiers = Object.keys(this.options.modifiers)
                      .map(function (e) {
                        return ve({ name: e }, r.options.modifiers[e]);
                      })
                      .sort(function (e, t) {
                        return e.order - t.order;
                      })),
                    this.modifiers.forEach(function (e) {
                      e.enabled &&
                        n(e.onLoad) &&
                        e.onLoad(r.reference, r.popper, r.options, e, r.state);
                    }),
                    this.update();
                  var s = this.options.eventsEnabled;
                  s && this.enableEventListeners(),
                    (this.state.eventsEnabled = s);
                }
                return (
                  me(e, [
                    {
                      key: "update",
                      value: function () {
                        return L.call(this);
                      },
                    },
                    {
                      key: "destroy",
                      value: function () {
                        return F.call(this);
                      },
                    },
                    {
                      key: "enableEventListeners",
                      value: function () {
                        return B.call(this);
                      },
                    },
                    {
                      key: "disableEventListeners",
                      value: function () {
                        return H.call(this);
                      },
                    },
                  ]),
                  e
                );
              })();
            return (
              (xe.Utils = (
                "undefined" != typeof window ? window : global
              ).PopperUtils),
              (xe.placements = be),
              (xe.Defaults = Ee),
              xe
            );
          }),
          "object" == typeof e && void 0 !== t
            ? (t.exports = i())
            : "function" == typeof define && define.amd
            ? define(i)
            : (n.Popper = i());
      },
    }),
    je = ke({
      "node_modules/bootstrap/dist/js/bootstrap.js"(e, t) {
        var n, i;
        (n = e),
          (i = function (e, t, n) {
            "use strict";
            function i(e) {
              return e && "object" == typeof e && "default" in e
                ? e
                : { default: e };
            }
            function r(e, t) {
              for (var n = 0; n < t.length; n++) {
                var i = t[n];
                (i.enumerable = i.enumerable || !1),
                  (i.configurable = !0),
                  "value" in i && (i.writable = !0),
                  Object.defineProperty(e, i.key, i);
              }
            }
            function o(e, t, n) {
              return (
                t && r(e.prototype, t),
                n && r(e, n),
                Object.defineProperty(e, "prototype", { writable: !1 }),
                e
              );
            }
            function s() {
              return (
                (s = Object.assign
                  ? Object.assign.bind()
                  : function (e) {
                      for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var i in n)
                          Object.prototype.hasOwnProperty.call(n, i) &&
                            (e[i] = n[i]);
                      }
                      return e;
                    }),
                s.apply(this, arguments)
              );
            }
            function a(e, t) {
              (e.prototype = Object.create(t.prototype)),
                (e.prototype.constructor = e),
                l(e, t);
            }
            function l(e, t) {
              return (l = Object.setPrototypeOf
                ? Object.setPrototypeOf.bind()
                : function (e, t) {
                    return (e.__proto__ = t), e;
                  })(e, t);
            }
            function u(e) {
              return null == e
                ? "" + e
                : {}.toString
                    .call(e)
                    .match(/\s([a-z]+)/i)[1]
                    .toLowerCase();
            }
            function c() {
              return {
                bindType: v,
                delegateType: v,
                handle: function (e) {
                  if (m.default(e.target).is(this))
                    return e.handleObj.handler.apply(this, arguments);
                },
              };
            }
            function d(e) {
              var t = this,
                n = !1;
              return (
                m.default(this).one(_.TRANSITION_END, function () {
                  n = !0;
                }),
                setTimeout(function () {
                  n || _.triggerTransitionEnd(t);
                }, e),
                this
              );
            }
            function f() {
              (m.default.fn.emulateTransitionEnd = d),
                (m.default.event.special[_.TRANSITION_END] = c());
            }
            function h(e, t) {
              var n = e.nodeName.toLowerCase();
              if (-1 !== t.indexOf(n))
                return (
                  -1 === Bn.indexOf(n) ||
                  Boolean(Hn.test(e.nodeValue) || Wn.test(e.nodeValue))
                );
              for (
                var i = t.filter(function (e) {
                    return e instanceof RegExp;
                  }),
                  r = 0,
                  o = i.length;
                r < o;
                r++
              )
                if (i[r].test(n)) return !0;
              return !1;
            }
            function p(e, t, n) {
              if (0 === e.length) return e;
              if (n && "function" == typeof n) return n(e);
              for (
                var i = new window.DOMParser().parseFromString(e, "text/html"),
                  r = Object.keys(t),
                  o = [].slice.call(i.body.querySelectorAll("*")),
                  s = function (e) {
                    var n = o[e],
                      i = n.nodeName.toLowerCase();
                    if (-1 === r.indexOf(n.nodeName.toLowerCase()))
                      return n.parentNode.removeChild(n), "continue";
                    var s = [].slice.call(n.attributes),
                      a = [].concat(t["*"] || [], t[i] || []);
                    s.forEach(function (e) {
                      h(e, a) || n.removeAttribute(e.nodeName);
                    });
                  },
                  a = 0,
                  l = o.length;
                a < l;
                a++
              )
                s(a);
              return i.body.innerHTML;
            }
            var m = i(t),
              g = i(n),
              v = "transitionend",
              y = 1e6,
              b = 1e3,
              _ = {
                TRANSITION_END: "bsTransitionEnd",
                getUID: function (e) {
                  do {
                    e += ~~(Math.random() * y);
                  } while (document.getElementById(e));
                  return e;
                },
                getSelectorFromElement: function (e) {
                  var t = e.getAttribute("data-target");
                  if (!t || "#" === t) {
                    var n = e.getAttribute("href");
                    t = n && "#" !== n ? n.trim() : "";
                  }
                  try {
                    return document.querySelector(t) ? t : null;
                  } catch (e) {
                    return null;
                  }
                },
                getTransitionDurationFromElement: function (e) {
                  if (!e) return 0;
                  var t = m.default(e).css("transition-duration"),
                    n = m.default(e).css("transition-delay"),
                    i = parseFloat(t),
                    r = parseFloat(n);
                  return i || r
                    ? ((t = t.split(",")[0]),
                      (n = n.split(",")[0]),
                      (parseFloat(t) + parseFloat(n)) * b)
                    : 0;
                },
                reflow: function (e) {
                  return e.offsetHeight;
                },
                triggerTransitionEnd: function (e) {
                  m.default(e).trigger(v);
                },
                supportsTransitionEnd: function () {
                  return Boolean(v);
                },
                isElement: function (e) {
                  return (e[0] || e).nodeType;
                },
                typeCheckConfig: function (e, t, n) {
                  for (var i in n)
                    if (Object.prototype.hasOwnProperty.call(n, i)) {
                      var r = n[i],
                        o = t[i],
                        s = o && _.isElement(o) ? "element" : u(o);
                      if (!new RegExp(r).test(s))
                        throw new Error(
                          e.toUpperCase() +
                            ': Option "' +
                            i +
                            '" provided type "' +
                            s +
                            '" but expected type "' +
                            r +
                            '".'
                        );
                    }
                },
                findShadowRoot: function (e) {
                  if (!document.documentElement.attachShadow) return null;
                  if ("function" == typeof e.getRootNode) {
                    var t = e.getRootNode();
                    return t instanceof ShadowRoot ? t : null;
                  }
                  return e instanceof ShadowRoot
                    ? e
                    : e.parentNode
                    ? _.findShadowRoot(e.parentNode)
                    : null;
                },
                jQueryDetection: function () {
                  if (void 0 === m.default)
                    throw new TypeError(
                      "Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript."
                    );
                  var e = m.default.fn.jquery.split(" ")[0].split("."),
                    t = 1,
                    n = 2,
                    i = 9,
                    r = 1,
                    o = 4;
                  if (
                    (e[0] < n && e[1] < i) ||
                    (e[0] === t && e[1] === i && e[2] < r) ||
                    e[0] >= o
                  )
                    throw new Error(
                      "Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0"
                    );
                },
              };
            _.jQueryDetection(), f();
            var w = "alert",
              E = "4.6.2",
              x = "bs.alert",
              T = "." + x,
              C = ".data-api",
              A = m.default.fn[w],
              k = "alert",
              S = "fade",
              N = "show",
              O = "close" + T,
              D = "closed" + T,
              j = "click" + T + C,
              L = '[data-dismiss="alert"]',
              I = (function () {
                function e(e) {
                  this._element = e;
                }
                var t = e.prototype;
                return (
                  (t.close = function (e) {
                    var t = this._element;
                    e && (t = this._getRootElement(e)),
                      this._triggerCloseEvent(t).isDefaultPrevented() ||
                        this._removeElement(t);
                  }),
                  (t.dispose = function () {
                    m.default.removeData(this._element, x),
                      (this._element = null);
                  }),
                  (t._getRootElement = function (e) {
                    var t = _.getSelectorFromElement(e),
                      n = !1;
                    return (
                      t && (n = document.querySelector(t)),
                      n || (n = m.default(e).closest("." + k)[0]),
                      n
                    );
                  }),
                  (t._triggerCloseEvent = function (e) {
                    var t = m.default.Event(O);
                    return m.default(e).trigger(t), t;
                  }),
                  (t._removeElement = function (e) {
                    var t = this;
                    if (
                      (m.default(e).removeClass(N), m.default(e).hasClass(S))
                    ) {
                      var n = _.getTransitionDurationFromElement(e);
                      m.default(e)
                        .one(_.TRANSITION_END, function (n) {
                          return t._destroyElement(e, n);
                        })
                        .emulateTransitionEnd(n);
                    } else this._destroyElement(e);
                  }),
                  (t._destroyElement = function (e) {
                    m.default(e).detach().trigger(D).remove();
                  }),
                  (e._jQueryInterface = function (t) {
                    return this.each(function () {
                      var n = m.default(this),
                        i = n.data(x);
                      i || ((i = new e(this)), n.data(x, i)),
                        "close" === t && i[t](this);
                    });
                  }),
                  (e._handleDismiss = function (e) {
                    return function (t) {
                      t && t.preventDefault(), e.close(this);
                    };
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return E;
                      },
                    },
                  ]),
                  e
                );
              })();
            m.default(document).on(j, L, I._handleDismiss(new I())),
              (m.default.fn[w] = I._jQueryInterface),
              (m.default.fn[w].Constructor = I),
              (m.default.fn[w].noConflict = function () {
                return (m.default.fn[w] = A), I._jQueryInterface;
              });
            var M = "button",
              F = "4.6.2",
              q = "bs.button",
              P = "." + q,
              R = ".data-api",
              B = m.default.fn[M],
              $ = "active",
              H = "btn",
              W = "focus",
              V = "click" + P + R,
              U = "focus" + P + R + " blur" + P + R,
              z = "load" + P + R,
              K = '[data-toggle^="button"]',
              Q = '[data-toggle="buttons"]',
              X = '[data-toggle="button"]',
              Y = '[data-toggle="buttons"] .btn',
              G = 'input:not([type="hidden"])',
              J = ".active",
              Z = ".btn",
              ee = (function () {
                function e(e) {
                  (this._element = e), (this.shouldAvoidTriggerChange = !1);
                }
                var t = e.prototype;
                return (
                  (t.toggle = function () {
                    var e = !0,
                      t = !0,
                      n = m.default(this._element).closest(Q)[0];
                    if (n) {
                      var i = this._element.querySelector(G);
                      if (i) {
                        if ("radio" === i.type)
                          if (i.checked && this._element.classList.contains($))
                            e = !1;
                          else {
                            var r = n.querySelector(J);
                            r && m.default(r).removeClass($);
                          }
                        e &&
                          (("checkbox" !== i.type && "radio" !== i.type) ||
                            (i.checked = !this._element.classList.contains($)),
                          this.shouldAvoidTriggerChange ||
                            m.default(i).trigger("change")),
                          i.focus(),
                          (t = !1);
                      }
                    }
                    this._element.hasAttribute("disabled") ||
                      this._element.classList.contains("disabled") ||
                      (t &&
                        this._element.setAttribute(
                          "aria-pressed",
                          !this._element.classList.contains($)
                        ),
                      e && m.default(this._element).toggleClass($));
                  }),
                  (t.dispose = function () {
                    m.default.removeData(this._element, q),
                      (this._element = null);
                  }),
                  (e._jQueryInterface = function (t, n) {
                    return this.each(function () {
                      var i = m.default(this),
                        r = i.data(q);
                      r || ((r = new e(this)), i.data(q, r)),
                        (r.shouldAvoidTriggerChange = n),
                        "toggle" === t && r[t]();
                    });
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return F;
                      },
                    },
                  ]),
                  e
                );
              })();
            m
              .default(document)
              .on(V, K, function (e) {
                var t = e.target,
                  n = t;
                if (
                  (m.default(t).hasClass(H) || (t = m.default(t).closest(Z)[0]),
                  !t ||
                    t.hasAttribute("disabled") ||
                    t.classList.contains("disabled"))
                )
                  e.preventDefault();
                else {
                  var i = t.querySelector(G);
                  if (
                    i &&
                    (i.hasAttribute("disabled") ||
                      i.classList.contains("disabled"))
                  )
                    return void e.preventDefault();
                  ("INPUT" !== n.tagName && "LABEL" === t.tagName) ||
                    ee._jQueryInterface.call(
                      m.default(t),
                      "toggle",
                      "INPUT" === n.tagName
                    );
                }
              })
              .on(U, K, function (e) {
                var t = m.default(e.target).closest(Z)[0];
                m.default(t).toggleClass(W, /^focus(in)?$/.test(e.type));
              }),
              m.default(window).on(z, function () {
                for (
                  var e = [].slice.call(document.querySelectorAll(Y)),
                    t = 0,
                    n = e.length;
                  t < n;
                  t++
                ) {
                  var i = e[t],
                    r = i.querySelector(G);
                  r.checked || r.hasAttribute("checked")
                    ? i.classList.add($)
                    : i.classList.remove($);
                }
                for (
                  var o = 0,
                    s = (e = [].slice.call(document.querySelectorAll(X)))
                      .length;
                  o < s;
                  o++
                ) {
                  var a = e[o];
                  "true" === a.getAttribute("aria-pressed")
                    ? a.classList.add($)
                    : a.classList.remove($);
                }
              }),
              (m.default.fn[M] = ee._jQueryInterface),
              (m.default.fn[M].Constructor = ee),
              (m.default.fn[M].noConflict = function () {
                return (m.default.fn[M] = B), ee._jQueryInterface;
              });
            var te = "carousel",
              ne = "4.6.2",
              ie = "bs.carousel",
              re = "." + ie,
              oe = ".data-api",
              se = m.default.fn[te],
              ae = 37,
              le = 39,
              ue = 500,
              ce = 40,
              de = "carousel",
              fe = "active",
              he = "slide",
              pe = "carousel-item-right",
              me = "carousel-item-left",
              ge = "carousel-item-next",
              ve = "carousel-item-prev",
              ye = "pointer-event",
              be = "next",
              _e = "prev",
              we = "left",
              Ee = "right",
              xe = "slide" + re,
              Te = "slid" + re,
              Ce = "keydown" + re,
              Ae = "mouseenter" + re,
              ke = "mouseleave" + re,
              Se = "touchstart" + re,
              Ne = "touchmove" + re,
              Oe = "touchend" + re,
              De = "pointerdown" + re,
              je = "pointerup" + re,
              Le = "dragstart" + re,
              Ie = "load" + re + oe,
              Me = "click" + re + oe,
              Fe = ".active",
              qe = ".active.carousel-item",
              Pe = ".carousel-item",
              Re = ".carousel-item img",
              Be = ".carousel-item-next, .carousel-item-prev",
              $e = ".carousel-indicators",
              He = "[data-slide], [data-slide-to]",
              We = '[data-ride="carousel"]',
              Ve = {
                interval: 5e3,
                keyboard: !0,
                slide: !1,
                pause: "hover",
                wrap: !0,
                touch: !0,
              },
              Ue = {
                interval: "(number|boolean)",
                keyboard: "boolean",
                slide: "(boolean|string)",
                pause: "(string|boolean)",
                wrap: "boolean",
                touch: "boolean",
              },
              ze = { TOUCH: "touch", PEN: "pen" },
              Ke = (function () {
                function e(e, t) {
                  (this._items = null),
                    (this._interval = null),
                    (this._activeElement = null),
                    (this._isPaused = !1),
                    (this._isSliding = !1),
                    (this.touchTimeout = null),
                    (this.touchStartX = 0),
                    (this.touchDeltaX = 0),
                    (this._config = this._getConfig(t)),
                    (this._element = e),
                    (this._indicatorsElement = this._element.querySelector($e)),
                    (this._touchSupported =
                      "ontouchstart" in document.documentElement ||
                      navigator.maxTouchPoints > 0),
                    (this._pointerEvent = Boolean(
                      window.PointerEvent || window.MSPointerEvent
                    )),
                    this._addEventListeners();
                }
                var t = e.prototype;
                return (
                  (t.next = function () {
                    this._isSliding || this._slide(be);
                  }),
                  (t.nextWhenVisible = function () {
                    var e = m.default(this._element);
                    !document.hidden &&
                      e.is(":visible") &&
                      "hidden" !== e.css("visibility") &&
                      this.next();
                  }),
                  (t.prev = function () {
                    this._isSliding || this._slide(_e);
                  }),
                  (t.pause = function (e) {
                    e || (this._isPaused = !0),
                      this._element.querySelector(Be) &&
                        (_.triggerTransitionEnd(this._element), this.cycle(!0)),
                      clearInterval(this._interval),
                      (this._interval = null);
                  }),
                  (t.cycle = function (e) {
                    e || (this._isPaused = !1),
                      this._interval &&
                        (clearInterval(this._interval),
                        (this._interval = null)),
                      this._config.interval &&
                        !this._isPaused &&
                        (this._updateInterval(),
                        (this._interval = setInterval(
                          (document.visibilityState
                            ? this.nextWhenVisible
                            : this.next
                          ).bind(this),
                          this._config.interval
                        )));
                  }),
                  (t.to = function (e) {
                    var t = this;
                    this._activeElement = this._element.querySelector(qe);
                    var n = this._getItemIndex(this._activeElement);
                    if (!(e > this._items.length - 1 || e < 0))
                      if (this._isSliding)
                        m.default(this._element).one(Te, function () {
                          return t.to(e);
                        });
                      else {
                        if (n === e) return this.pause(), void this.cycle();
                        var i = e > n ? be : _e;
                        this._slide(i, this._items[e]);
                      }
                  }),
                  (t.dispose = function () {
                    m.default(this._element).off(re),
                      m.default.removeData(this._element, ie),
                      (this._items = null),
                      (this._config = null),
                      (this._element = null),
                      (this._interval = null),
                      (this._isPaused = null),
                      (this._isSliding = null),
                      (this._activeElement = null),
                      (this._indicatorsElement = null);
                  }),
                  (t._getConfig = function (e) {
                    return (e = s({}, Ve, e)), _.typeCheckConfig(te, e, Ue), e;
                  }),
                  (t._handleSwipe = function () {
                    var e = Math.abs(this.touchDeltaX);
                    if (!(e <= ce)) {
                      var t = e / this.touchDeltaX;
                      (this.touchDeltaX = 0),
                        t > 0 && this.prev(),
                        t < 0 && this.next();
                    }
                  }),
                  (t._addEventListeners = function () {
                    var e = this;
                    this._config.keyboard &&
                      m.default(this._element).on(Ce, function (t) {
                        return e._keydown(t);
                      }),
                      "hover" === this._config.pause &&
                        m
                          .default(this._element)
                          .on(Ae, function (t) {
                            return e.pause(t);
                          })
                          .on(ke, function (t) {
                            return e.cycle(t);
                          }),
                      this._config.touch && this._addTouchEventListeners();
                  }),
                  (t._addTouchEventListeners = function () {
                    var e = this;
                    if (this._touchSupported) {
                      var t = function (t) {
                          e._pointerEvent &&
                          ze[t.originalEvent.pointerType.toUpperCase()]
                            ? (e.touchStartX = t.originalEvent.clientX)
                            : e._pointerEvent ||
                              (e.touchStartX =
                                t.originalEvent.touches[0].clientX);
                        },
                        n = function (t) {
                          e.touchDeltaX =
                            t.originalEvent.touches &&
                            t.originalEvent.touches.length > 1
                              ? 0
                              : t.originalEvent.touches[0].clientX -
                                e.touchStartX;
                        },
                        i = function (t) {
                          e._pointerEvent &&
                            ze[t.originalEvent.pointerType.toUpperCase()] &&
                            (e.touchDeltaX =
                              t.originalEvent.clientX - e.touchStartX),
                            e._handleSwipe(),
                            "hover" === e._config.pause &&
                              (e.pause(),
                              e.touchTimeout && clearTimeout(e.touchTimeout),
                              (e.touchTimeout = setTimeout(function (t) {
                                return e.cycle(t);
                              }, ue + e._config.interval)));
                        };
                      m
                        .default(this._element.querySelectorAll(Re))
                        .on(Le, function (e) {
                          return e.preventDefault();
                        }),
                        this._pointerEvent
                          ? (m.default(this._element).on(De, function (e) {
                              return t(e);
                            }),
                            m.default(this._element).on(je, function (e) {
                              return i(e);
                            }),
                            this._element.classList.add(ye))
                          : (m.default(this._element).on(Se, function (e) {
                              return t(e);
                            }),
                            m.default(this._element).on(Ne, function (e) {
                              return n(e);
                            }),
                            m.default(this._element).on(Oe, function (e) {
                              return i(e);
                            }));
                    }
                  }),
                  (t._keydown = function (e) {
                    if (!/input|textarea/i.test(e.target.tagName))
                      switch (e.which) {
                        case ae:
                          e.preventDefault(), this.prev();
                          break;
                        case le:
                          e.preventDefault(), this.next();
                      }
                  }),
                  (t._getItemIndex = function (e) {
                    return (
                      (this._items =
                        e && e.parentNode
                          ? [].slice.call(e.parentNode.querySelectorAll(Pe))
                          : []),
                      this._items.indexOf(e)
                    );
                  }),
                  (t._getItemByDirection = function (e, t) {
                    var n = e === be,
                      i = e === _e,
                      r = this._getItemIndex(t),
                      o = this._items.length - 1;
                    if (
                      ((i && 0 === r) || (n && r === o)) &&
                      !this._config.wrap
                    )
                      return t;
                    var s = (r + (e === _e ? -1 : 1)) % this._items.length;
                    return -1 === s
                      ? this._items[this._items.length - 1]
                      : this._items[s];
                  }),
                  (t._triggerSlideEvent = function (e, t) {
                    var n = this._getItemIndex(e),
                      i = this._getItemIndex(this._element.querySelector(qe)),
                      r = m.default.Event(xe, {
                        relatedTarget: e,
                        direction: t,
                        from: i,
                        to: n,
                      });
                    return m.default(this._element).trigger(r), r;
                  }),
                  (t._setActiveIndicatorElement = function (e) {
                    if (this._indicatorsElement) {
                      var t = [].slice.call(
                        this._indicatorsElement.querySelectorAll(Fe)
                      );
                      m.default(t).removeClass(fe);
                      var n =
                        this._indicatorsElement.children[this._getItemIndex(e)];
                      n && m.default(n).addClass(fe);
                    }
                  }),
                  (t._updateInterval = function () {
                    var e =
                      this._activeElement || this._element.querySelector(qe);
                    if (e) {
                      var t = parseInt(e.getAttribute("data-interval"), 10);
                      t
                        ? ((this._config.defaultInterval =
                            this._config.defaultInterval ||
                            this._config.interval),
                          (this._config.interval = t))
                        : (this._config.interval =
                            this._config.defaultInterval ||
                            this._config.interval);
                    }
                  }),
                  (t._slide = function (e, t) {
                    var n,
                      i,
                      r,
                      o = this,
                      s = this._element.querySelector(qe),
                      a = this._getItemIndex(s),
                      l = t || (s && this._getItemByDirection(e, s)),
                      u = this._getItemIndex(l),
                      c = Boolean(this._interval);
                    if (
                      (e === be
                        ? ((n = me), (i = ge), (r = we))
                        : ((n = pe), (i = ve), (r = Ee)),
                      l && m.default(l).hasClass(fe))
                    )
                      this._isSliding = !1;
                    else if (
                      !this._triggerSlideEvent(l, r).isDefaultPrevented() &&
                      s &&
                      l
                    ) {
                      (this._isSliding = !0),
                        c && this.pause(),
                        this._setActiveIndicatorElement(l),
                        (this._activeElement = l);
                      var d = m.default.Event(Te, {
                        relatedTarget: l,
                        direction: r,
                        from: a,
                        to: u,
                      });
                      if (m.default(this._element).hasClass(he)) {
                        m.default(l).addClass(i),
                          _.reflow(l),
                          m.default(s).addClass(n),
                          m.default(l).addClass(n);
                        var f = _.getTransitionDurationFromElement(s);
                        m.default(s)
                          .one(_.TRANSITION_END, function () {
                            m
                              .default(l)
                              .removeClass(n + " " + i)
                              .addClass(fe),
                              m.default(s).removeClass(fe + " " + i + " " + n),
                              (o._isSliding = !1),
                              setTimeout(function () {
                                return m.default(o._element).trigger(d);
                              }, 0);
                          })
                          .emulateTransitionEnd(f);
                      } else
                        m.default(s).removeClass(fe),
                          m.default(l).addClass(fe),
                          (this._isSliding = !1),
                          m.default(this._element).trigger(d);
                      c && this.cycle();
                    }
                  }),
                  (e._jQueryInterface = function (t) {
                    return this.each(function () {
                      var n = m.default(this).data(ie),
                        i = s({}, Ve, m.default(this).data());
                      "object" == typeof t && (i = s({}, i, t));
                      var r = "string" == typeof t ? t : i.slide;
                      if (
                        (n ||
                          ((n = new e(this, i)), m.default(this).data(ie, n)),
                        "number" == typeof t)
                      )
                        n.to(t);
                      else if ("string" == typeof r) {
                        if (void 0 === n[r])
                          throw new TypeError('No method named "' + r + '"');
                        n[r]();
                      } else i.interval && i.ride && (n.pause(), n.cycle());
                    });
                  }),
                  (e._dataApiClickHandler = function (t) {
                    var n = _.getSelectorFromElement(this);
                    if (n) {
                      var i = m.default(n)[0];
                      if (i && m.default(i).hasClass(de)) {
                        var r = s(
                            {},
                            m.default(i).data(),
                            m.default(this).data()
                          ),
                          o = this.getAttribute("data-slide-to");
                        o && (r.interval = !1),
                          e._jQueryInterface.call(m.default(i), r),
                          o && m.default(i).data(ie).to(o),
                          t.preventDefault();
                      }
                    }
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return ne;
                      },
                    },
                    {
                      key: "Default",
                      get: function () {
                        return Ve;
                      },
                    },
                  ]),
                  e
                );
              })();
            m.default(document).on(Me, He, Ke._dataApiClickHandler),
              m.default(window).on(Ie, function () {
                for (
                  var e = [].slice.call(document.querySelectorAll(We)),
                    t = 0,
                    n = e.length;
                  t < n;
                  t++
                ) {
                  var i = m.default(e[t]);
                  Ke._jQueryInterface.call(i, i.data());
                }
              }),
              (m.default.fn[te] = Ke._jQueryInterface),
              (m.default.fn[te].Constructor = Ke),
              (m.default.fn[te].noConflict = function () {
                return (m.default.fn[te] = se), Ke._jQueryInterface;
              });
            var Qe = "collapse",
              Xe = "4.6.2",
              Ye = "bs.collapse",
              Ge = "." + Ye,
              Je = ".data-api",
              Ze = m.default.fn[Qe],
              et = "show",
              tt = "collapse",
              nt = "collapsing",
              it = "collapsed",
              rt = "width",
              ot = "height",
              st = "show" + Ge,
              at = "shown" + Ge,
              lt = "hide" + Ge,
              ut = "hidden" + Ge,
              ct = "click" + Ge + Je,
              dt = ".show, .collapsing",
              ft = '[data-toggle="collapse"]',
              ht = { toggle: !0, parent: "" },
              pt = { toggle: "boolean", parent: "(string|element)" },
              mt = (function () {
                function e(e, t) {
                  (this._isTransitioning = !1),
                    (this._element = e),
                    (this._config = this._getConfig(t)),
                    (this._triggerArray = [].slice.call(
                      document.querySelectorAll(
                        '[data-toggle="collapse"][href="#' +
                          e.id +
                          '"],[data-toggle="collapse"][data-target="#' +
                          e.id +
                          '"]'
                      )
                    ));
                  for (
                    var n = [].slice.call(document.querySelectorAll(ft)),
                      i = 0,
                      r = n.length;
                    i < r;
                    i++
                  ) {
                    var o = n[i],
                      s = _.getSelectorFromElement(o),
                      a = [].slice
                        .call(document.querySelectorAll(s))
                        .filter(function (t) {
                          return t === e;
                        });
                    null !== s &&
                      a.length > 0 &&
                      ((this._selector = s), this._triggerArray.push(o));
                  }
                  (this._parent = this._config.parent
                    ? this._getParent()
                    : null),
                    this._config.parent ||
                      this._addAriaAndCollapsedClass(
                        this._element,
                        this._triggerArray
                      ),
                    this._config.toggle && this.toggle();
                }
                var t = e.prototype;
                return (
                  (t.toggle = function () {
                    m.default(this._element).hasClass(et)
                      ? this.hide()
                      : this.show();
                  }),
                  (t.show = function () {
                    var t,
                      n,
                      i = this;
                    if (
                      !(
                        this._isTransitioning ||
                        m.default(this._element).hasClass(et) ||
                        (this._parent &&
                          0 ===
                            (t = [].slice
                              .call(this._parent.querySelectorAll(dt))
                              .filter(function (e) {
                                return "string" == typeof i._config.parent
                                  ? e.getAttribute("data-parent") ===
                                      i._config.parent
                                  : e.classList.contains(tt);
                              })).length &&
                          (t = null),
                        t &&
                          (n = m.default(t).not(this._selector).data(Ye)) &&
                          n._isTransitioning)
                      )
                    ) {
                      var r = m.default.Event(st);
                      if (
                        (m.default(this._element).trigger(r),
                        !r.isDefaultPrevented())
                      ) {
                        t &&
                          (e._jQueryInterface.call(
                            m.default(t).not(this._selector),
                            "hide"
                          ),
                          n || m.default(t).data(Ye, null));
                        var o = this._getDimension();
                        m.default(this._element).removeClass(tt).addClass(nt),
                          (this._element.style[o] = 0),
                          this._triggerArray.length &&
                            m
                              .default(this._triggerArray)
                              .removeClass(it)
                              .attr("aria-expanded", !0),
                          this.setTransitioning(!0);
                        var s = function () {
                            m
                              .default(i._element)
                              .removeClass(nt)
                              .addClass(tt + " " + et),
                              (i._element.style[o] = ""),
                              i.setTransitioning(!1),
                              m.default(i._element).trigger(at);
                          },
                          a = "scroll" + (o[0].toUpperCase() + o.slice(1)),
                          l = _.getTransitionDurationFromElement(this._element);
                        m
                          .default(this._element)
                          .one(_.TRANSITION_END, s)
                          .emulateTransitionEnd(l),
                          (this._element.style[o] = this._element[a] + "px");
                      }
                    }
                  }),
                  (t.hide = function () {
                    var e = this;
                    if (
                      !this._isTransitioning &&
                      m.default(this._element).hasClass(et)
                    ) {
                      var t = m.default.Event(lt);
                      if (
                        (m.default(this._element).trigger(t),
                        !t.isDefaultPrevented())
                      ) {
                        var n = this._getDimension();
                        (this._element.style[n] =
                          this._element.getBoundingClientRect()[n] + "px"),
                          _.reflow(this._element),
                          m
                            .default(this._element)
                            .addClass(nt)
                            .removeClass(tt + " " + et);
                        var i = this._triggerArray.length;
                        if (i > 0)
                          for (var r = 0; r < i; r++) {
                            var o = this._triggerArray[r],
                              s = _.getSelectorFromElement(o);
                            null !== s &&
                              (m
                                .default(
                                  [].slice.call(document.querySelectorAll(s))
                                )
                                .hasClass(et) ||
                                m
                                  .default(o)
                                  .addClass(it)
                                  .attr("aria-expanded", !1));
                          }
                        this.setTransitioning(!0);
                        var a = function () {
                          e.setTransitioning(!1),
                            m
                              .default(e._element)
                              .removeClass(nt)
                              .addClass(tt)
                              .trigger(ut);
                        };
                        this._element.style[n] = "";
                        var l = _.getTransitionDurationFromElement(
                          this._element
                        );
                        m.default(this._element)
                          .one(_.TRANSITION_END, a)
                          .emulateTransitionEnd(l);
                      }
                    }
                  }),
                  (t.setTransitioning = function (e) {
                    this._isTransitioning = e;
                  }),
                  (t.dispose = function () {
                    m.default.removeData(this._element, Ye),
                      (this._config = null),
                      (this._parent = null),
                      (this._element = null),
                      (this._triggerArray = null),
                      (this._isTransitioning = null);
                  }),
                  (t._getConfig = function (e) {
                    return (
                      ((e = s({}, ht, e)).toggle = Boolean(e.toggle)),
                      _.typeCheckConfig(Qe, e, pt),
                      e
                    );
                  }),
                  (t._getDimension = function () {
                    return m.default(this._element).hasClass(rt) ? rt : ot;
                  }),
                  (t._getParent = function () {
                    var t,
                      n = this;
                    _.isElement(this._config.parent)
                      ? ((t = this._config.parent),
                        void 0 !== this._config.parent.jquery &&
                          (t = this._config.parent[0]))
                      : (t = document.querySelector(this._config.parent));
                    var i =
                        '[data-toggle="collapse"][data-parent="' +
                        this._config.parent +
                        '"]',
                      r = [].slice.call(t.querySelectorAll(i));
                    return (
                      m.default(r).each(function (t, i) {
                        n._addAriaAndCollapsedClass(
                          e._getTargetFromElement(i),
                          [i]
                        );
                      }),
                      t
                    );
                  }),
                  (t._addAriaAndCollapsedClass = function (e, t) {
                    var n = m.default(e).hasClass(et);
                    t.length &&
                      m.default(t).toggleClass(it, !n).attr("aria-expanded", n);
                  }),
                  (e._getTargetFromElement = function (e) {
                    var t = _.getSelectorFromElement(e);
                    return t ? document.querySelector(t) : null;
                  }),
                  (e._jQueryInterface = function (t) {
                    return this.each(function () {
                      var n = m.default(this),
                        i = n.data(Ye),
                        r = s(
                          {},
                          ht,
                          n.data(),
                          "object" == typeof t && t ? t : {}
                        );
                      if (
                        (!i &&
                          r.toggle &&
                          "string" == typeof t &&
                          /show|hide/.test(t) &&
                          (r.toggle = !1),
                        i || ((i = new e(this, r)), n.data(Ye, i)),
                        "string" == typeof t)
                      ) {
                        if (void 0 === i[t])
                          throw new TypeError('No method named "' + t + '"');
                        i[t]();
                      }
                    });
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return Xe;
                      },
                    },
                    {
                      key: "Default",
                      get: function () {
                        return ht;
                      },
                    },
                  ]),
                  e
                );
              })();
            m.default(document).on(ct, ft, function (e) {
              "A" === e.currentTarget.tagName && e.preventDefault();
              var t = m.default(this),
                n = _.getSelectorFromElement(this),
                i = [].slice.call(document.querySelectorAll(n));
              m.default(i).each(function () {
                var e = m.default(this),
                  n = e.data(Ye) ? "toggle" : t.data();
                mt._jQueryInterface.call(e, n);
              });
            }),
              (m.default.fn[Qe] = mt._jQueryInterface),
              (m.default.fn[Qe].Constructor = mt),
              (m.default.fn[Qe].noConflict = function () {
                return (m.default.fn[Qe] = Ze), mt._jQueryInterface;
              });
            var gt = "dropdown",
              vt = "4.6.2",
              yt = "bs.dropdown",
              bt = "." + yt,
              _t = ".data-api",
              wt = m.default.fn[gt],
              Et = 27,
              xt = 32,
              Tt = 9,
              Ct = 38,
              At = 40,
              kt = 3,
              St = new RegExp(Ct + "|" + At + "|" + Et),
              Nt = "disabled",
              Ot = "show",
              Dt = "dropup",
              jt = "dropright",
              Lt = "dropleft",
              It = "dropdown-menu-right",
              Mt = "position-static",
              Ft = "hide" + bt,
              qt = "hidden" + bt,
              Pt = "show" + bt,
              Rt = "shown" + bt,
              Bt = "click" + bt,
              $t = "click" + bt + _t,
              Ht = "keydown" + bt + _t,
              Wt = "keyup" + bt + _t,
              Vt = '[data-toggle="dropdown"]',
              Ut = ".dropdown form",
              zt = ".dropdown-menu",
              Kt = ".navbar-nav",
              Qt =
                ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)",
              Xt = "top-start",
              Yt = "top-end",
              Gt = "bottom-start",
              Jt = "bottom-end",
              Zt = "right-start",
              en = "left-start",
              tn = {
                offset: 0,
                flip: !0,
                boundary: "scrollParent",
                reference: "toggle",
                display: "dynamic",
                popperConfig: null,
              },
              nn = {
                offset: "(number|string|function)",
                flip: "boolean",
                boundary: "(string|element)",
                reference: "(string|element)",
                display: "string",
                popperConfig: "(null|object)",
              },
              rn = (function () {
                function e(e, t) {
                  (this._element = e),
                    (this._popper = null),
                    (this._config = this._getConfig(t)),
                    (this._menu = this._getMenuElement()),
                    (this._inNavbar = this._detectNavbar()),
                    this._addEventListeners();
                }
                var t = e.prototype;
                return (
                  (t.toggle = function () {
                    if (
                      !this._element.disabled &&
                      !m.default(this._element).hasClass(Nt)
                    ) {
                      var t = m.default(this._menu).hasClass(Ot);
                      e._clearMenus(), t || this.show(!0);
                    }
                  }),
                  (t.show = function (t) {
                    if (
                      (void 0 === t && (t = !1),
                      !(
                        this._element.disabled ||
                        m.default(this._element).hasClass(Nt) ||
                        m.default(this._menu).hasClass(Ot)
                      ))
                    ) {
                      var n = { relatedTarget: this._element },
                        i = m.default.Event(Pt, n),
                        r = e._getParentFromElement(this._element);
                      if ((m.default(r).trigger(i), !i.isDefaultPrevented())) {
                        if (!this._inNavbar && t) {
                          if (void 0 === g.default)
                            throw new TypeError(
                              "Bootstrap's dropdowns require Popper (https://popper.js.org)"
                            );
                          var o = this._element;
                          "parent" === this._config.reference
                            ? (o = r)
                            : _.isElement(this._config.reference) &&
                              ((o = this._config.reference),
                              void 0 !== this._config.reference.jquery &&
                                (o = this._config.reference[0])),
                            "scrollParent" !== this._config.boundary &&
                              m.default(r).addClass(Mt),
                            (this._popper = new g.default(
                              o,
                              this._menu,
                              this._getPopperConfig()
                            ));
                        }
                        "ontouchstart" in document.documentElement &&
                          0 === m.default(r).closest(Kt).length &&
                          m
                            .default(document.body)
                            .children()
                            .on("mouseover", null, m.default.noop),
                          this._element.focus(),
                          this._element.setAttribute("aria-expanded", !0),
                          m.default(this._menu).toggleClass(Ot),
                          m
                            .default(r)
                            .toggleClass(Ot)
                            .trigger(m.default.Event(Rt, n));
                      }
                    }
                  }),
                  (t.hide = function () {
                    if (
                      !this._element.disabled &&
                      !m.default(this._element).hasClass(Nt) &&
                      m.default(this._menu).hasClass(Ot)
                    ) {
                      var t = { relatedTarget: this._element },
                        n = m.default.Event(Ft, t),
                        i = e._getParentFromElement(this._element);
                      m.default(i).trigger(n),
                        n.isDefaultPrevented() ||
                          (this._popper && this._popper.destroy(),
                          m.default(this._menu).toggleClass(Ot),
                          m
                            .default(i)
                            .toggleClass(Ot)
                            .trigger(m.default.Event(qt, t)));
                    }
                  }),
                  (t.dispose = function () {
                    m.default.removeData(this._element, yt),
                      m.default(this._element).off(bt),
                      (this._element = null),
                      (this._menu = null),
                      null !== this._popper &&
                        (this._popper.destroy(), (this._popper = null));
                  }),
                  (t.update = function () {
                    (this._inNavbar = this._detectNavbar()),
                      null !== this._popper && this._popper.scheduleUpdate();
                  }),
                  (t._addEventListeners = function () {
                    var e = this;
                    m.default(this._element).on(Bt, function (t) {
                      t.preventDefault(), t.stopPropagation(), e.toggle();
                    });
                  }),
                  (t._getConfig = function (e) {
                    return (
                      (e = s(
                        {},
                        this.constructor.Default,
                        m.default(this._element).data(),
                        e
                      )),
                      _.typeCheckConfig(gt, e, this.constructor.DefaultType),
                      e
                    );
                  }),
                  (t._getMenuElement = function () {
                    if (!this._menu) {
                      var t = e._getParentFromElement(this._element);
                      t && (this._menu = t.querySelector(zt));
                    }
                    return this._menu;
                  }),
                  (t._getPlacement = function () {
                    var e = m.default(this._element.parentNode),
                      t = Gt;
                    return (
                      e.hasClass(Dt)
                        ? (t = m.default(this._menu).hasClass(It) ? Yt : Xt)
                        : e.hasClass(jt)
                        ? (t = Zt)
                        : e.hasClass(Lt)
                        ? (t = en)
                        : m.default(this._menu).hasClass(It) && (t = Jt),
                      t
                    );
                  }),
                  (t._detectNavbar = function () {
                    return (
                      m.default(this._element).closest(".navbar").length > 0
                    );
                  }),
                  (t._getOffset = function () {
                    var e = this,
                      t = {};
                    return (
                      "function" == typeof this._config.offset
                        ? (t.fn = function (t) {
                            return (
                              (t.offsets = s(
                                {},
                                t.offsets,
                                e._config.offset(t.offsets, e._element)
                              )),
                              t
                            );
                          })
                        : (t.offset = this._config.offset),
                      t
                    );
                  }),
                  (t._getPopperConfig = function () {
                    var e = {
                      placement: this._getPlacement(),
                      modifiers: {
                        offset: this._getOffset(),
                        flip: { enabled: this._config.flip },
                        preventOverflow: {
                          boundariesElement: this._config.boundary,
                        },
                      },
                    };
                    return (
                      "static" === this._config.display &&
                        (e.modifiers.applyStyle = { enabled: !1 }),
                      s({}, e, this._config.popperConfig)
                    );
                  }),
                  (e._jQueryInterface = function (t) {
                    return this.each(function () {
                      var n = m.default(this).data(yt);
                      if (
                        (n ||
                          ((n = new e(this, "object" == typeof t ? t : null)),
                          m.default(this).data(yt, n)),
                        "string" == typeof t)
                      ) {
                        if (void 0 === n[t])
                          throw new TypeError('No method named "' + t + '"');
                        n[t]();
                      }
                    });
                  }),
                  (e._clearMenus = function (t) {
                    if (
                      !t ||
                      (t.which !== kt && ("keyup" !== t.type || t.which === Tt))
                    )
                      for (
                        var n = [].slice.call(document.querySelectorAll(Vt)),
                          i = 0,
                          r = n.length;
                        i < r;
                        i++
                      ) {
                        var o = e._getParentFromElement(n[i]),
                          s = m.default(n[i]).data(yt),
                          a = { relatedTarget: n[i] };
                        if (
                          (t && "click" === t.type && (a.clickEvent = t), s)
                        ) {
                          var l = s._menu;
                          if (
                            m.default(o).hasClass(Ot) &&
                            !(
                              t &&
                              (("click" === t.type &&
                                /input|textarea/i.test(t.target.tagName)) ||
                                ("keyup" === t.type && t.which === Tt)) &&
                              m.default.contains(o, t.target)
                            )
                          ) {
                            var u = m.default.Event(Ft, a);
                            m.default(o).trigger(u),
                              u.isDefaultPrevented() ||
                                ("ontouchstart" in document.documentElement &&
                                  m
                                    .default(document.body)
                                    .children()
                                    .off("mouseover", null, m.default.noop),
                                n[i].setAttribute("aria-expanded", "false"),
                                s._popper && s._popper.destroy(),
                                m.default(l).removeClass(Ot),
                                m
                                  .default(o)
                                  .removeClass(Ot)
                                  .trigger(m.default.Event(qt, a)));
                          }
                        }
                      }
                  }),
                  (e._getParentFromElement = function (e) {
                    var t,
                      n = _.getSelectorFromElement(e);
                    return (
                      n && (t = document.querySelector(n)), t || e.parentNode
                    );
                  }),
                  (e._dataApiKeydownHandler = function (t) {
                    if (
                      !(/input|textarea/i.test(t.target.tagName)
                        ? t.which === xt ||
                          (t.which !== Et &&
                            ((t.which !== At && t.which !== Ct) ||
                              m.default(t.target).closest(zt).length))
                        : !St.test(t.which)) &&
                      !this.disabled &&
                      !m.default(this).hasClass(Nt)
                    ) {
                      var n = e._getParentFromElement(this),
                        i = m.default(n).hasClass(Ot);
                      if (i || t.which !== Et) {
                        if (
                          (t.preventDefault(),
                          t.stopPropagation(),
                          !i || t.which === Et || t.which === xt)
                        )
                          return (
                            t.which === Et &&
                              m.default(n.querySelector(Vt)).trigger("focus"),
                            void m.default(this).trigger("click")
                          );
                        var r = [].slice
                          .call(n.querySelectorAll(Qt))
                          .filter(function (e) {
                            return m.default(e).is(":visible");
                          });
                        if (0 !== r.length) {
                          var o = r.indexOf(t.target);
                          t.which === Ct && o > 0 && o--,
                            t.which === At && o < r.length - 1 && o++,
                            o < 0 && (o = 0),
                            r[o].focus();
                        }
                      }
                    }
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return vt;
                      },
                    },
                    {
                      key: "Default",
                      get: function () {
                        return tn;
                      },
                    },
                    {
                      key: "DefaultType",
                      get: function () {
                        return nn;
                      },
                    },
                  ]),
                  e
                );
              })();
            m
              .default(document)
              .on(Ht, Vt, rn._dataApiKeydownHandler)
              .on(Ht, zt, rn._dataApiKeydownHandler)
              .on($t + " " + Wt, rn._clearMenus)
              .on($t, Vt, function (e) {
                e.preventDefault(),
                  e.stopPropagation(),
                  rn._jQueryInterface.call(m.default(this), "toggle");
              })
              .on($t, Ut, function (e) {
                e.stopPropagation();
              }),
              (m.default.fn[gt] = rn._jQueryInterface),
              (m.default.fn[gt].Constructor = rn),
              (m.default.fn[gt].noConflict = function () {
                return (m.default.fn[gt] = wt), rn._jQueryInterface;
              });
            var on = "modal",
              sn = "4.6.2",
              an = "bs.modal",
              ln = "." + an,
              un = ".data-api",
              cn = m.default.fn[on],
              dn = 27,
              fn = "modal-dialog-scrollable",
              hn = "modal-scrollbar-measure",
              pn = "modal-backdrop",
              mn = "modal-open",
              gn = "fade",
              vn = "show",
              yn = "modal-static",
              bn = "hide" + ln,
              _n = "hidePrevented" + ln,
              wn = "hidden" + ln,
              En = "show" + ln,
              xn = "shown" + ln,
              Tn = "focusin" + ln,
              Cn = "resize" + ln,
              An = "click.dismiss" + ln,
              kn = "keydown.dismiss" + ln,
              Sn = "mouseup.dismiss" + ln,
              Nn = "mousedown.dismiss" + ln,
              On = "click" + ln + un,
              Dn = ".modal-dialog",
              jn = ".modal-body",
              Ln = '[data-toggle="modal"]',
              In = '[data-dismiss="modal"]',
              Mn = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
              Fn = ".sticky-top",
              qn = { backdrop: !0, keyboard: !0, focus: !0, show: !0 },
              Pn = {
                backdrop: "(boolean|string)",
                keyboard: "boolean",
                focus: "boolean",
                show: "boolean",
              },
              Rn = (function () {
                function e(e, t) {
                  (this._config = this._getConfig(t)),
                    (this._element = e),
                    (this._dialog = e.querySelector(Dn)),
                    (this._backdrop = null),
                    (this._isShown = !1),
                    (this._isBodyOverflowing = !1),
                    (this._ignoreBackdropClick = !1),
                    (this._isTransitioning = !1),
                    (this._scrollbarWidth = 0);
                }
                var t = e.prototype;
                return (
                  (t.toggle = function (e) {
                    return this._isShown ? this.hide() : this.show(e);
                  }),
                  (t.show = function (e) {
                    var t = this;
                    if (!this._isShown && !this._isTransitioning) {
                      var n = m.default.Event(En, { relatedTarget: e });
                      m.default(this._element).trigger(n),
                        n.isDefaultPrevented() ||
                          ((this._isShown = !0),
                          m.default(this._element).hasClass(gn) &&
                            (this._isTransitioning = !0),
                          this._checkScrollbar(),
                          this._setScrollbar(),
                          this._adjustDialog(),
                          this._setEscapeEvent(),
                          this._setResizeEvent(),
                          m.default(this._element).on(An, In, function (e) {
                            return t.hide(e);
                          }),
                          m.default(this._dialog).on(Nn, function () {
                            m.default(t._element).one(Sn, function (e) {
                              m.default(e.target).is(t._element) &&
                                (t._ignoreBackdropClick = !0);
                            });
                          }),
                          this._showBackdrop(function () {
                            return t._showElement(e);
                          }));
                    }
                  }),
                  (t.hide = function (e) {
                    var t = this;
                    if (
                      (e && e.preventDefault(),
                      this._isShown && !this._isTransitioning)
                    ) {
                      var n = m.default.Event(bn);
                      if (
                        (m.default(this._element).trigger(n),
                        this._isShown && !n.isDefaultPrevented())
                      ) {
                        this._isShown = !1;
                        var i = m.default(this._element).hasClass(gn);
                        if (
                          (i && (this._isTransitioning = !0),
                          this._setEscapeEvent(),
                          this._setResizeEvent(),
                          m.default(document).off(Tn),
                          m.default(this._element).removeClass(vn),
                          m.default(this._element).off(An),
                          m.default(this._dialog).off(Nn),
                          i)
                        ) {
                          var r = _.getTransitionDurationFromElement(
                            this._element
                          );
                          m.default(this._element)
                            .one(_.TRANSITION_END, function (e) {
                              return t._hideModal(e);
                            })
                            .emulateTransitionEnd(r);
                        } else this._hideModal();
                      }
                    }
                  }),
                  (t.dispose = function () {
                    [window, this._element, this._dialog].forEach(function (e) {
                      return m.default(e).off(ln);
                    }),
                      m.default(document).off(Tn),
                      m.default.removeData(this._element, an),
                      (this._config = null),
                      (this._element = null),
                      (this._dialog = null),
                      (this._backdrop = null),
                      (this._isShown = null),
                      (this._isBodyOverflowing = null),
                      (this._ignoreBackdropClick = null),
                      (this._isTransitioning = null),
                      (this._scrollbarWidth = null);
                  }),
                  (t.handleUpdate = function () {
                    this._adjustDialog();
                  }),
                  (t._getConfig = function (e) {
                    return (e = s({}, qn, e)), _.typeCheckConfig(on, e, Pn), e;
                  }),
                  (t._triggerBackdropTransition = function () {
                    var e = this,
                      t = m.default.Event(_n);
                    if (
                      (m.default(this._element).trigger(t),
                      !t.isDefaultPrevented())
                    ) {
                      var n =
                        this._element.scrollHeight >
                        document.documentElement.clientHeight;
                      n || (this._element.style.overflowY = "hidden"),
                        this._element.classList.add(yn);
                      var i = _.getTransitionDurationFromElement(this._dialog);
                      m.default(this._element).off(_.TRANSITION_END),
                        m
                          .default(this._element)
                          .one(_.TRANSITION_END, function () {
                            e._element.classList.remove(yn),
                              n ||
                                m
                                  .default(e._element)
                                  .one(_.TRANSITION_END, function () {
                                    e._element.style.overflowY = "";
                                  })
                                  .emulateTransitionEnd(e._element, i);
                          })
                          .emulateTransitionEnd(i),
                        this._element.focus();
                    }
                  }),
                  (t._showElement = function (e) {
                    var t = this,
                      n = m.default(this._element).hasClass(gn),
                      i = this._dialog ? this._dialog.querySelector(jn) : null;
                    (this._element.parentNode &&
                      this._element.parentNode.nodeType ===
                        Node.ELEMENT_NODE) ||
                      document.body.appendChild(this._element),
                      (this._element.style.display = "block"),
                      this._element.removeAttribute("aria-hidden"),
                      this._element.setAttribute("aria-modal", !0),
                      this._element.setAttribute("role", "dialog"),
                      m.default(this._dialog).hasClass(fn) && i
                        ? (i.scrollTop = 0)
                        : (this._element.scrollTop = 0),
                      n && _.reflow(this._element),
                      m.default(this._element).addClass(vn),
                      this._config.focus && this._enforceFocus();
                    var r = m.default.Event(xn, { relatedTarget: e }),
                      o = function () {
                        t._config.focus && t._element.focus(),
                          (t._isTransitioning = !1),
                          m.default(t._element).trigger(r);
                      };
                    if (n) {
                      var s = _.getTransitionDurationFromElement(this._dialog);
                      m.default(this._dialog)
                        .one(_.TRANSITION_END, o)
                        .emulateTransitionEnd(s);
                    } else o();
                  }),
                  (t._enforceFocus = function () {
                    var e = this;
                    m.default(document)
                      .off(Tn)
                      .on(Tn, function (t) {
                        document !== t.target &&
                          e._element !== t.target &&
                          0 === m.default(e._element).has(t.target).length &&
                          e._element.focus();
                      });
                  }),
                  (t._setEscapeEvent = function () {
                    var e = this;
                    this._isShown
                      ? m.default(this._element).on(kn, function (t) {
                          e._config.keyboard && t.which === dn
                            ? (t.preventDefault(), e.hide())
                            : e._config.keyboard ||
                              t.which !== dn ||
                              e._triggerBackdropTransition();
                        })
                      : this._isShown || m.default(this._element).off(kn);
                  }),
                  (t._setResizeEvent = function () {
                    var e = this;
                    this._isShown
                      ? m.default(window).on(Cn, function (t) {
                          return e.handleUpdate(t);
                        })
                      : m.default(window).off(Cn);
                  }),
                  (t._hideModal = function () {
                    var e = this;
                    (this._element.style.display = "none"),
                      this._element.setAttribute("aria-hidden", !0),
                      this._element.removeAttribute("aria-modal"),
                      this._element.removeAttribute("role"),
                      (this._isTransitioning = !1),
                      this._showBackdrop(function () {
                        m.default(document.body).removeClass(mn),
                          e._resetAdjustments(),
                          e._resetScrollbar(),
                          m.default(e._element).trigger(wn);
                      });
                  }),
                  (t._removeBackdrop = function () {
                    this._backdrop &&
                      (m.default(this._backdrop).remove(),
                      (this._backdrop = null));
                  }),
                  (t._showBackdrop = function (e) {
                    var t = this,
                      n = m.default(this._element).hasClass(gn) ? gn : "";
                    if (this._isShown && this._config.backdrop) {
                      if (
                        ((this._backdrop = document.createElement("div")),
                        (this._backdrop.className = pn),
                        n && this._backdrop.classList.add(n),
                        m.default(this._backdrop).appendTo(document.body),
                        m.default(this._element).on(An, function (e) {
                          t._ignoreBackdropClick
                            ? (t._ignoreBackdropClick = !1)
                            : e.target === e.currentTarget &&
                              ("static" === t._config.backdrop
                                ? t._triggerBackdropTransition()
                                : t.hide());
                        }),
                        n && _.reflow(this._backdrop),
                        m.default(this._backdrop).addClass(vn),
                        !e)
                      )
                        return;
                      if (!n) return void e();
                      var i = _.getTransitionDurationFromElement(
                        this._backdrop
                      );
                      m.default(this._backdrop)
                        .one(_.TRANSITION_END, e)
                        .emulateTransitionEnd(i);
                    } else if (!this._isShown && this._backdrop) {
                      m.default(this._backdrop).removeClass(vn);
                      var r = function () {
                        t._removeBackdrop(), e && e();
                      };
                      if (m.default(this._element).hasClass(gn)) {
                        var o = _.getTransitionDurationFromElement(
                          this._backdrop
                        );
                        m.default(this._backdrop)
                          .one(_.TRANSITION_END, r)
                          .emulateTransitionEnd(o);
                      } else r();
                    } else e && e();
                  }),
                  (t._adjustDialog = function () {
                    var e =
                      this._element.scrollHeight >
                      document.documentElement.clientHeight;
                    !this._isBodyOverflowing &&
                      e &&
                      (this._element.style.paddingLeft =
                        this._scrollbarWidth + "px"),
                      this._isBodyOverflowing &&
                        !e &&
                        (this._element.style.paddingRight =
                          this._scrollbarWidth + "px");
                  }),
                  (t._resetAdjustments = function () {
                    (this._element.style.paddingLeft = ""),
                      (this._element.style.paddingRight = "");
                  }),
                  (t._checkScrollbar = function () {
                    var e = document.body.getBoundingClientRect();
                    (this._isBodyOverflowing =
                      Math.round(e.left + e.right) < window.innerWidth),
                      (this._scrollbarWidth = this._getScrollbarWidth());
                  }),
                  (t._setScrollbar = function () {
                    var e = this;
                    if (this._isBodyOverflowing) {
                      var t = [].slice.call(document.querySelectorAll(Mn)),
                        n = [].slice.call(document.querySelectorAll(Fn));
                      m.default(t).each(function (t, n) {
                        var i = n.style.paddingRight,
                          r = m.default(n).css("padding-right");
                        m.default(n)
                          .data("padding-right", i)
                          .css(
                            "padding-right",
                            parseFloat(r) + e._scrollbarWidth + "px"
                          );
                      }),
                        m.default(n).each(function (t, n) {
                          var i = n.style.marginRight,
                            r = m.default(n).css("margin-right");
                          m.default(n)
                            .data("margin-right", i)
                            .css(
                              "margin-right",
                              parseFloat(r) - e._scrollbarWidth + "px"
                            );
                        });
                      var i = document.body.style.paddingRight,
                        r = m.default(document.body).css("padding-right");
                      m.default(document.body)
                        .data("padding-right", i)
                        .css(
                          "padding-right",
                          parseFloat(r) + this._scrollbarWidth + "px"
                        );
                    }
                    m.default(document.body).addClass(mn);
                  }),
                  (t._resetScrollbar = function () {
                    var e = [].slice.call(document.querySelectorAll(Mn));
                    m.default(e).each(function (e, t) {
                      var n = m.default(t).data("padding-right");
                      m.default(t).removeData("padding-right"),
                        (t.style.paddingRight = n || "");
                    });
                    var t = [].slice.call(document.querySelectorAll("" + Fn));
                    m.default(t).each(function (e, t) {
                      var n = m.default(t).data("margin-right");
                      void 0 !== n &&
                        m
                          .default(t)
                          .css("margin-right", n)
                          .removeData("margin-right");
                    });
                    var n = m.default(document.body).data("padding-right");
                    m.default(document.body).removeData("padding-right"),
                      (document.body.style.paddingRight = n || "");
                  }),
                  (t._getScrollbarWidth = function () {
                    var e = document.createElement("div");
                    (e.className = hn), document.body.appendChild(e);
                    var t = e.getBoundingClientRect().width - e.clientWidth;
                    return document.body.removeChild(e), t;
                  }),
                  (e._jQueryInterface = function (t, n) {
                    return this.each(function () {
                      var i = m.default(this).data(an),
                        r = s(
                          {},
                          qn,
                          m.default(this).data(),
                          "object" == typeof t && t ? t : {}
                        );
                      if (
                        (i ||
                          ((i = new e(this, r)), m.default(this).data(an, i)),
                        "string" == typeof t)
                      ) {
                        if (void 0 === i[t])
                          throw new TypeError('No method named "' + t + '"');
                        i[t](n);
                      } else r.show && i.show(n);
                    });
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return sn;
                      },
                    },
                    {
                      key: "Default",
                      get: function () {
                        return qn;
                      },
                    },
                  ]),
                  e
                );
              })();
            m.default(document).on(On, Ln, function (e) {
              var t,
                n = this,
                i = _.getSelectorFromElement(this);
              i && (t = document.querySelector(i));
              var r = m.default(t).data(an)
                ? "toggle"
                : s({}, m.default(t).data(), m.default(this).data());
              ("A" !== this.tagName && "AREA" !== this.tagName) ||
                e.preventDefault();
              var o = m.default(t).one(En, function (e) {
                e.isDefaultPrevented() ||
                  o.one(wn, function () {
                    m.default(n).is(":visible") && n.focus();
                  });
              });
              Rn._jQueryInterface.call(m.default(t), r, this);
            }),
              (m.default.fn[on] = Rn._jQueryInterface),
              (m.default.fn[on].Constructor = Rn),
              (m.default.fn[on].noConflict = function () {
                return (m.default.fn[on] = cn), Rn._jQueryInterface;
              });
            var Bn = [
                "background",
                "cite",
                "href",
                "itemtype",
                "longdesc",
                "poster",
                "src",
                "xlink:href",
              ],
              $n = {
                "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
                a: ["target", "href", "title", "rel"],
                area: [],
                b: [],
                br: [],
                col: [],
                code: [],
                div: [],
                em: [],
                hr: [],
                h1: [],
                h2: [],
                h3: [],
                h4: [],
                h5: [],
                h6: [],
                i: [],
                img: ["src", "srcset", "alt", "title", "width", "height"],
                li: [],
                ol: [],
                p: [],
                pre: [],
                s: [],
                small: [],
                span: [],
                sub: [],
                sup: [],
                strong: [],
                u: [],
                ul: [],
              },
              Hn =
                /^(?:(?:https?|mailto|ftp|tel|file|sms):|[^#&/:?]*(?:[#/?]|$))/i,
              Wn =
                /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i,
              Vn = "tooltip",
              Un = "4.6.2",
              zn = "bs.tooltip",
              Kn = "." + zn,
              Qn = m.default.fn[Vn],
              Xn = "bs-tooltip",
              Yn = new RegExp("(^|\\s)" + Xn + "\\S+", "g"),
              Gn = ["sanitize", "whiteList", "sanitizeFn"],
              Jn = "fade",
              Zn = "show",
              ei = "show",
              ti = "out",
              ni = ".tooltip-inner",
              ii = ".arrow",
              ri = "hover",
              oi = "focus",
              si = "click",
              ai = "manual",
              li = {
                AUTO: "auto",
                TOP: "top",
                RIGHT: "right",
                BOTTOM: "bottom",
                LEFT: "left",
              },
              ui = {
                animation: !0,
                template:
                  '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
                trigger: "hover focus",
                title: "",
                delay: 0,
                html: !1,
                selector: !1,
                placement: "top",
                offset: 0,
                container: !1,
                fallbackPlacement: "flip",
                boundary: "scrollParent",
                customClass: "",
                sanitize: !0,
                sanitizeFn: null,
                whiteList: $n,
                popperConfig: null,
              },
              ci = {
                animation: "boolean",
                template: "string",
                title: "(string|element|function)",
                trigger: "string",
                delay: "(number|object)",
                html: "boolean",
                selector: "(string|boolean)",
                placement: "(string|function)",
                offset: "(number|string|function)",
                container: "(string|element|boolean)",
                fallbackPlacement: "(string|array)",
                boundary: "(string|element)",
                customClass: "(string|function)",
                sanitize: "boolean",
                sanitizeFn: "(null|function)",
                whiteList: "object",
                popperConfig: "(null|object)",
              },
              di = {
                HIDE: "hide" + Kn,
                HIDDEN: "hidden" + Kn,
                SHOW: "show" + Kn,
                SHOWN: "shown" + Kn,
                INSERTED: "inserted" + Kn,
                CLICK: "click" + Kn,
                FOCUSIN: "focusin" + Kn,
                FOCUSOUT: "focusout" + Kn,
                MOUSEENTER: "mouseenter" + Kn,
                MOUSELEAVE: "mouseleave" + Kn,
              },
              fi = (function () {
                function e(e, t) {
                  if (void 0 === g.default)
                    throw new TypeError(
                      "Bootstrap's tooltips require Popper (https://popper.js.org)"
                    );
                  (this._isEnabled = !0),
                    (this._timeout = 0),
                    (this._hoverState = ""),
                    (this._activeTrigger = {}),
                    (this._popper = null),
                    (this.element = e),
                    (this.config = this._getConfig(t)),
                    (this.tip = null),
                    this._setListeners();
                }
                var t = e.prototype;
                return (
                  (t.enable = function () {
                    this._isEnabled = !0;
                  }),
                  (t.disable = function () {
                    this._isEnabled = !1;
                  }),
                  (t.toggleEnabled = function () {
                    this._isEnabled = !this._isEnabled;
                  }),
                  (t.toggle = function (e) {
                    if (this._isEnabled)
                      if (e) {
                        var t = this.constructor.DATA_KEY,
                          n = m.default(e.currentTarget).data(t);
                        n ||
                          ((n = new this.constructor(
                            e.currentTarget,
                            this._getDelegateConfig()
                          )),
                          m.default(e.currentTarget).data(t, n)),
                          (n._activeTrigger.click = !n._activeTrigger.click),
                          n._isWithActiveTrigger()
                            ? n._enter(null, n)
                            : n._leave(null, n);
                      } else {
                        if (m.default(this.getTipElement()).hasClass(Zn))
                          return void this._leave(null, this);
                        this._enter(null, this);
                      }
                  }),
                  (t.dispose = function () {
                    clearTimeout(this._timeout),
                      m.default.removeData(
                        this.element,
                        this.constructor.DATA_KEY
                      ),
                      m.default(this.element).off(this.constructor.EVENT_KEY),
                      m
                        .default(this.element)
                        .closest(".modal")
                        .off("hide.bs.modal", this._hideModalHandler),
                      this.tip && m.default(this.tip).remove(),
                      (this._isEnabled = null),
                      (this._timeout = null),
                      (this._hoverState = null),
                      (this._activeTrigger = null),
                      this._popper && this._popper.destroy(),
                      (this._popper = null),
                      (this.element = null),
                      (this.config = null),
                      (this.tip = null);
                  }),
                  (t.show = function () {
                    var e = this;
                    if ("none" === m.default(this.element).css("display"))
                      throw new Error("Please use show on visible elements");
                    var t = m.default.Event(this.constructor.Event.SHOW);
                    if (this.isWithContent() && this._isEnabled) {
                      m.default(this.element).trigger(t);
                      var n = _.findShadowRoot(this.element),
                        i = m.default.contains(
                          null !== n
                            ? n
                            : this.element.ownerDocument.documentElement,
                          this.element
                        );
                      if (t.isDefaultPrevented() || !i) return;
                      var r = this.getTipElement(),
                        o = _.getUID(this.constructor.NAME);
                      r.setAttribute("id", o),
                        this.element.setAttribute("aria-describedby", o),
                        this.setContent(),
                        this.config.animation && m.default(r).addClass(Jn);
                      var s =
                          "function" == typeof this.config.placement
                            ? this.config.placement.call(this, r, this.element)
                            : this.config.placement,
                        a = this._getAttachment(s);
                      this.addAttachmentClass(a);
                      var l = this._getContainer();
                      m.default(r).data(this.constructor.DATA_KEY, this),
                        m.default.contains(
                          this.element.ownerDocument.documentElement,
                          this.tip
                        ) || m.default(r).appendTo(l),
                        m
                          .default(this.element)
                          .trigger(this.constructor.Event.INSERTED),
                        (this._popper = new g.default(
                          this.element,
                          r,
                          this._getPopperConfig(a)
                        )),
                        m.default(r).addClass(Zn),
                        m.default(r).addClass(this.config.customClass),
                        "ontouchstart" in document.documentElement &&
                          m
                            .default(document.body)
                            .children()
                            .on("mouseover", null, m.default.noop);
                      var u = function () {
                        e.config.animation && e._fixTransition();
                        var t = e._hoverState;
                        (e._hoverState = null),
                          m
                            .default(e.element)
                            .trigger(e.constructor.Event.SHOWN),
                          t === ti && e._leave(null, e);
                      };
                      if (m.default(this.tip).hasClass(Jn)) {
                        var c = _.getTransitionDurationFromElement(this.tip);
                        m.default(this.tip)
                          .one(_.TRANSITION_END, u)
                          .emulateTransitionEnd(c);
                      } else u();
                    }
                  }),
                  (t.hide = function (e) {
                    var t = this,
                      n = this.getTipElement(),
                      i = m.default.Event(this.constructor.Event.HIDE),
                      r = function () {
                        t._hoverState !== ei &&
                          n.parentNode &&
                          n.parentNode.removeChild(n),
                          t._cleanTipClass(),
                          t.element.removeAttribute("aria-describedby"),
                          m
                            .default(t.element)
                            .trigger(t.constructor.Event.HIDDEN),
                          null !== t._popper && t._popper.destroy(),
                          e && e();
                      };
                    if (
                      (m.default(this.element).trigger(i),
                      !i.isDefaultPrevented())
                    ) {
                      if (
                        (m.default(n).removeClass(Zn),
                        "ontouchstart" in document.documentElement &&
                          m
                            .default(document.body)
                            .children()
                            .off("mouseover", null, m.default.noop),
                        (this._activeTrigger[si] = !1),
                        (this._activeTrigger[oi] = !1),
                        (this._activeTrigger[ri] = !1),
                        m.default(this.tip).hasClass(Jn))
                      ) {
                        var o = _.getTransitionDurationFromElement(n);
                        m.default(n)
                          .one(_.TRANSITION_END, r)
                          .emulateTransitionEnd(o);
                      } else r();
                      this._hoverState = "";
                    }
                  }),
                  (t.update = function () {
                    null !== this._popper && this._popper.scheduleUpdate();
                  }),
                  (t.isWithContent = function () {
                    return Boolean(this.getTitle());
                  }),
                  (t.addAttachmentClass = function (e) {
                    m.default(this.getTipElement()).addClass(Xn + "-" + e);
                  }),
                  (t.getTipElement = function () {
                    return (
                      (this.tip =
                        this.tip || m.default(this.config.template)[0]),
                      this.tip
                    );
                  }),
                  (t.setContent = function () {
                    var e = this.getTipElement();
                    this.setElementContent(
                      m.default(e.querySelectorAll(ni)),
                      this.getTitle()
                    ),
                      m.default(e).removeClass(Jn + " " + Zn);
                  }),
                  (t.setElementContent = function (e, t) {
                    "object" != typeof t || (!t.nodeType && !t.jquery)
                      ? this.config.html
                        ? (this.config.sanitize &&
                            (t = p(
                              t,
                              this.config.whiteList,
                              this.config.sanitizeFn
                            )),
                          e.html(t))
                        : e.text(t)
                      : this.config.html
                      ? m.default(t).parent().is(e) || e.empty().append(t)
                      : e.text(m.default(t).text());
                  }),
                  (t.getTitle = function () {
                    var e = this.element.getAttribute("data-original-title");
                    return (
                      e ||
                        (e =
                          "function" == typeof this.config.title
                            ? this.config.title.call(this.element)
                            : this.config.title),
                      e
                    );
                  }),
                  (t._getPopperConfig = function (e) {
                    var t = this;
                    return s(
                      {},
                      {
                        placement: e,
                        modifiers: {
                          offset: this._getOffset(),
                          flip: { behavior: this.config.fallbackPlacement },
                          arrow: { element: ii },
                          preventOverflow: {
                            boundariesElement: this.config.boundary,
                          },
                        },
                        onCreate: function (e) {
                          e.originalPlacement !== e.placement &&
                            t._handlePopperPlacementChange(e);
                        },
                        onUpdate: function (e) {
                          return t._handlePopperPlacementChange(e);
                        },
                      },
                      this.config.popperConfig
                    );
                  }),
                  (t._getOffset = function () {
                    var e = this,
                      t = {};
                    return (
                      "function" == typeof this.config.offset
                        ? (t.fn = function (t) {
                            return (
                              (t.offsets = s(
                                {},
                                t.offsets,
                                e.config.offset(t.offsets, e.element)
                              )),
                              t
                            );
                          })
                        : (t.offset = this.config.offset),
                      t
                    );
                  }),
                  (t._getContainer = function () {
                    return !1 === this.config.container
                      ? document.body
                      : _.isElement(this.config.container)
                      ? m.default(this.config.container)
                      : m.default(document).find(this.config.container);
                  }),
                  (t._getAttachment = function (e) {
                    return li[e.toUpperCase()];
                  }),
                  (t._setListeners = function () {
                    var e = this;
                    this.config.trigger.split(" ").forEach(function (t) {
                      if ("click" === t)
                        m.default(e.element).on(
                          e.constructor.Event.CLICK,
                          e.config.selector,
                          function (t) {
                            return e.toggle(t);
                          }
                        );
                      else if (t !== ai) {
                        var n =
                            t === ri
                              ? e.constructor.Event.MOUSEENTER
                              : e.constructor.Event.FOCUSIN,
                          i =
                            t === ri
                              ? e.constructor.Event.MOUSELEAVE
                              : e.constructor.Event.FOCUSOUT;
                        m.default(e.element)
                          .on(n, e.config.selector, function (t) {
                            return e._enter(t);
                          })
                          .on(i, e.config.selector, function (t) {
                            return e._leave(t);
                          });
                      }
                    }),
                      (this._hideModalHandler = function () {
                        e.element && e.hide();
                      }),
                      m
                        .default(this.element)
                        .closest(".modal")
                        .on("hide.bs.modal", this._hideModalHandler),
                      this.config.selector
                        ? (this.config = s({}, this.config, {
                            trigger: "manual",
                            selector: "",
                          }))
                        : this._fixTitle();
                  }),
                  (t._fixTitle = function () {
                    var e = typeof this.element.getAttribute(
                      "data-original-title"
                    );
                    (this.element.getAttribute("title") || "string" !== e) &&
                      (this.element.setAttribute(
                        "data-original-title",
                        this.element.getAttribute("title") || ""
                      ),
                      this.element.setAttribute("title", ""));
                  }),
                  (t._enter = function (e, t) {
                    var n = this.constructor.DATA_KEY;
                    (t = t || m.default(e.currentTarget).data(n)) ||
                      ((t = new this.constructor(
                        e.currentTarget,
                        this._getDelegateConfig()
                      )),
                      m.default(e.currentTarget).data(n, t)),
                      e &&
                        (t._activeTrigger["focusin" === e.type ? oi : ri] = !0),
                      m.default(t.getTipElement()).hasClass(Zn) ||
                      t._hoverState === ei
                        ? (t._hoverState = ei)
                        : (clearTimeout(t._timeout),
                          (t._hoverState = ei),
                          t.config.delay && t.config.delay.show
                            ? (t._timeout = setTimeout(function () {
                                t._hoverState === ei && t.show();
                              }, t.config.delay.show))
                            : t.show());
                  }),
                  (t._leave = function (e, t) {
                    var n = this.constructor.DATA_KEY;
                    (t = t || m.default(e.currentTarget).data(n)) ||
                      ((t = new this.constructor(
                        e.currentTarget,
                        this._getDelegateConfig()
                      )),
                      m.default(e.currentTarget).data(n, t)),
                      e &&
                        (t._activeTrigger["focusout" === e.type ? oi : ri] =
                          !1),
                      t._isWithActiveTrigger() ||
                        (clearTimeout(t._timeout),
                        (t._hoverState = ti),
                        t.config.delay && t.config.delay.hide
                          ? (t._timeout = setTimeout(function () {
                              t._hoverState === ti && t.hide();
                            }, t.config.delay.hide))
                          : t.hide());
                  }),
                  (t._isWithActiveTrigger = function () {
                    for (var e in this._activeTrigger)
                      if (this._activeTrigger[e]) return !0;
                    return !1;
                  }),
                  (t._getConfig = function (e) {
                    var t = m.default(this.element).data();
                    return (
                      Object.keys(t).forEach(function (e) {
                        -1 !== Gn.indexOf(e) && delete t[e];
                      }),
                      "number" ==
                        typeof (e = s(
                          {},
                          this.constructor.Default,
                          t,
                          "object" == typeof e && e ? e : {}
                        )).delay &&
                        (e.delay = { show: e.delay, hide: e.delay }),
                      "number" == typeof e.title &&
                        (e.title = e.title.toString()),
                      "number" == typeof e.content &&
                        (e.content = e.content.toString()),
                      _.typeCheckConfig(Vn, e, this.constructor.DefaultType),
                      e.sanitize &&
                        (e.template = p(e.template, e.whiteList, e.sanitizeFn)),
                      e
                    );
                  }),
                  (t._getDelegateConfig = function () {
                    var e = {};
                    if (this.config)
                      for (var t in this.config)
                        this.constructor.Default[t] !== this.config[t] &&
                          (e[t] = this.config[t]);
                    return e;
                  }),
                  (t._cleanTipClass = function () {
                    var e = m.default(this.getTipElement()),
                      t = e.attr("class").match(Yn);
                    null !== t && t.length && e.removeClass(t.join(""));
                  }),
                  (t._handlePopperPlacementChange = function (e) {
                    (this.tip = e.instance.popper),
                      this._cleanTipClass(),
                      this.addAttachmentClass(this._getAttachment(e.placement));
                  }),
                  (t._fixTransition = function () {
                    var e = this.getTipElement(),
                      t = this.config.animation;
                    null === e.getAttribute("x-placement") &&
                      (m.default(e).removeClass(Jn),
                      (this.config.animation = !1),
                      this.hide(),
                      this.show(),
                      (this.config.animation = t));
                  }),
                  (e._jQueryInterface = function (t) {
                    return this.each(function () {
                      var n = m.default(this),
                        i = n.data(zn),
                        r = "object" == typeof t && t;
                      if (
                        (i || !/dispose|hide/.test(t)) &&
                        (i || ((i = new e(this, r)), n.data(zn, i)),
                        "string" == typeof t)
                      ) {
                        if (void 0 === i[t])
                          throw new TypeError('No method named "' + t + '"');
                        i[t]();
                      }
                    });
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return Un;
                      },
                    },
                    {
                      key: "Default",
                      get: function () {
                        return ui;
                      },
                    },
                    {
                      key: "NAME",
                      get: function () {
                        return Vn;
                      },
                    },
                    {
                      key: "DATA_KEY",
                      get: function () {
                        return zn;
                      },
                    },
                    {
                      key: "Event",
                      get: function () {
                        return di;
                      },
                    },
                    {
                      key: "EVENT_KEY",
                      get: function () {
                        return Kn;
                      },
                    },
                    {
                      key: "DefaultType",
                      get: function () {
                        return ci;
                      },
                    },
                  ]),
                  e
                );
              })();
            (m.default.fn[Vn] = fi._jQueryInterface),
              (m.default.fn[Vn].Constructor = fi),
              (m.default.fn[Vn].noConflict = function () {
                return (m.default.fn[Vn] = Qn), fi._jQueryInterface;
              });
            var hi = "popover",
              pi = "4.6.2",
              mi = "bs.popover",
              gi = "." + mi,
              vi = m.default.fn[hi],
              yi = "bs-popover",
              bi = new RegExp("(^|\\s)" + yi + "\\S+", "g"),
              _i = "fade",
              wi = "show",
              Ei = ".popover-header",
              xi = ".popover-body",
              Ti = s({}, fi.Default, {
                placement: "right",
                trigger: "click",
                content: "",
                template:
                  '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
              }),
              Ci = s({}, fi.DefaultType, {
                content: "(string|element|function)",
              }),
              Ai = {
                HIDE: "hide" + gi,
                HIDDEN: "hidden" + gi,
                SHOW: "show" + gi,
                SHOWN: "shown" + gi,
                INSERTED: "inserted" + gi,
                CLICK: "click" + gi,
                FOCUSIN: "focusin" + gi,
                FOCUSOUT: "focusout" + gi,
                MOUSEENTER: "mouseenter" + gi,
                MOUSELEAVE: "mouseleave" + gi,
              },
              ki = (function (e) {
                function t() {
                  return e.apply(this, arguments) || this;
                }
                a(t, e);
                var n = t.prototype;
                return (
                  (n.isWithContent = function () {
                    return this.getTitle() || this._getContent();
                  }),
                  (n.addAttachmentClass = function (e) {
                    m.default(this.getTipElement()).addClass(yi + "-" + e);
                  }),
                  (n.getTipElement = function () {
                    return (
                      (this.tip =
                        this.tip || m.default(this.config.template)[0]),
                      this.tip
                    );
                  }),
                  (n.setContent = function () {
                    var e = m.default(this.getTipElement());
                    this.setElementContent(e.find(Ei), this.getTitle());
                    var t = this._getContent();
                    "function" == typeof t && (t = t.call(this.element)),
                      this.setElementContent(e.find(xi), t),
                      e.removeClass(_i + " " + wi);
                  }),
                  (n._getContent = function () {
                    return (
                      this.element.getAttribute("data-content") ||
                      this.config.content
                    );
                  }),
                  (n._cleanTipClass = function () {
                    var e = m.default(this.getTipElement()),
                      t = e.attr("class").match(bi);
                    null !== t && t.length > 0 && e.removeClass(t.join(""));
                  }),
                  (t._jQueryInterface = function (e) {
                    return this.each(function () {
                      var n = m.default(this).data(mi),
                        i = "object" == typeof e ? e : null;
                      if (
                        (n || !/dispose|hide/.test(e)) &&
                        (n ||
                          ((n = new t(this, i)), m.default(this).data(mi, n)),
                        "string" == typeof e)
                      ) {
                        if (void 0 === n[e])
                          throw new TypeError('No method named "' + e + '"');
                        n[e]();
                      }
                    });
                  }),
                  o(t, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return pi;
                      },
                    },
                    {
                      key: "Default",
                      get: function () {
                        return Ti;
                      },
                    },
                    {
                      key: "NAME",
                      get: function () {
                        return hi;
                      },
                    },
                    {
                      key: "DATA_KEY",
                      get: function () {
                        return mi;
                      },
                    },
                    {
                      key: "Event",
                      get: function () {
                        return Ai;
                      },
                    },
                    {
                      key: "EVENT_KEY",
                      get: function () {
                        return gi;
                      },
                    },
                    {
                      key: "DefaultType",
                      get: function () {
                        return Ci;
                      },
                    },
                  ]),
                  t
                );
              })(fi);
            (m.default.fn[hi] = ki._jQueryInterface),
              (m.default.fn[hi].Constructor = ki),
              (m.default.fn[hi].noConflict = function () {
                return (m.default.fn[hi] = vi), ki._jQueryInterface;
              });
            var Si = "scrollspy",
              Ni = "4.6.2",
              Oi = "bs.scrollspy",
              Di = "." + Oi,
              ji = ".data-api",
              Li = m.default.fn[Si],
              Ii = "dropdown-item",
              Mi = "active",
              Fi = "activate" + Di,
              qi = "scroll" + Di,
              Pi = "load" + Di + ji,
              Ri = "offset",
              Bi = "position",
              $i = '[data-spy="scroll"]',
              Hi = ".nav, .list-group",
              Wi = ".nav-link",
              Vi = ".nav-item",
              Ui = ".list-group-item",
              zi = ".dropdown",
              Ki = ".dropdown-item",
              Qi = ".dropdown-toggle",
              Xi = { offset: 10, method: "auto", target: "" },
              Yi = {
                offset: "number",
                method: "string",
                target: "(string|element)",
              },
              Gi = (function () {
                function e(e, t) {
                  var n = this;
                  (this._element = e),
                    (this._scrollElement = "BODY" === e.tagName ? window : e),
                    (this._config = this._getConfig(t)),
                    (this._selector =
                      this._config.target +
                      " " +
                      Wi +
                      "," +
                      this._config.target +
                      " " +
                      Ui +
                      "," +
                      this._config.target +
                      " " +
                      Ki),
                    (this._offsets = []),
                    (this._targets = []),
                    (this._activeTarget = null),
                    (this._scrollHeight = 0),
                    m.default(this._scrollElement).on(qi, function (e) {
                      return n._process(e);
                    }),
                    this.refresh(),
                    this._process();
                }
                var t = e.prototype;
                return (
                  (t.refresh = function () {
                    var e = this,
                      t =
                        this._scrollElement === this._scrollElement.window
                          ? Ri
                          : Bi,
                      n =
                        "auto" === this._config.method
                          ? t
                          : this._config.method,
                      i = n === Bi ? this._getScrollTop() : 0;
                    (this._offsets = []),
                      (this._targets = []),
                      (this._scrollHeight = this._getScrollHeight()),
                      [].slice
                        .call(document.querySelectorAll(this._selector))
                        .map(function (e) {
                          var t,
                            r = _.getSelectorFromElement(e);
                          if ((r && (t = document.querySelector(r)), t)) {
                            var o = t.getBoundingClientRect();
                            if (o.width || o.height)
                              return [m.default(t)[n]().top + i, r];
                          }
                          return null;
                        })
                        .filter(Boolean)
                        .sort(function (e, t) {
                          return e[0] - t[0];
                        })
                        .forEach(function (t) {
                          e._offsets.push(t[0]), e._targets.push(t[1]);
                        });
                  }),
                  (t.dispose = function () {
                    m.default.removeData(this._element, Oi),
                      m.default(this._scrollElement).off(Di),
                      (this._element = null),
                      (this._scrollElement = null),
                      (this._config = null),
                      (this._selector = null),
                      (this._offsets = null),
                      (this._targets = null),
                      (this._activeTarget = null),
                      (this._scrollHeight = null);
                  }),
                  (t._getConfig = function (e) {
                    if (
                      "string" !=
                        typeof (e = s(
                          {},
                          Xi,
                          "object" == typeof e && e ? e : {}
                        )).target &&
                      _.isElement(e.target)
                    ) {
                      var t = m.default(e.target).attr("id");
                      t ||
                        ((t = _.getUID(Si)), m.default(e.target).attr("id", t)),
                        (e.target = "#" + t);
                    }
                    return _.typeCheckConfig(Si, e, Yi), e;
                  }),
                  (t._getScrollTop = function () {
                    return this._scrollElement === window
                      ? this._scrollElement.pageYOffset
                      : this._scrollElement.scrollTop;
                  }),
                  (t._getScrollHeight = function () {
                    return (
                      this._scrollElement.scrollHeight ||
                      Math.max(
                        document.body.scrollHeight,
                        document.documentElement.scrollHeight
                      )
                    );
                  }),
                  (t._getOffsetHeight = function () {
                    return this._scrollElement === window
                      ? window.innerHeight
                      : this._scrollElement.getBoundingClientRect().height;
                  }),
                  (t._process = function () {
                    var e = this._getScrollTop() + this._config.offset,
                      t = this._getScrollHeight(),
                      n = this._config.offset + t - this._getOffsetHeight();
                    if ((this._scrollHeight !== t && this.refresh(), e >= n)) {
                      var i = this._targets[this._targets.length - 1];
                      this._activeTarget !== i && this._activate(i);
                    } else {
                      if (
                        this._activeTarget &&
                        e < this._offsets[0] &&
                        this._offsets[0] > 0
                      )
                        return (this._activeTarget = null), void this._clear();
                      for (var r = this._offsets.length; r--; )
                        this._activeTarget !== this._targets[r] &&
                          e >= this._offsets[r] &&
                          (void 0 === this._offsets[r + 1] ||
                            e < this._offsets[r + 1]) &&
                          this._activate(this._targets[r]);
                    }
                  }),
                  (t._activate = function (e) {
                    (this._activeTarget = e), this._clear();
                    var t = this._selector.split(",").map(function (t) {
                        return (
                          t +
                          '[data-target="' +
                          e +
                          '"],' +
                          t +
                          '[href="' +
                          e +
                          '"]'
                        );
                      }),
                      n = m.default(
                        [].slice.call(document.querySelectorAll(t.join(",")))
                      );
                    n.hasClass(Ii)
                      ? (n.closest(zi).find(Qi).addClass(Mi), n.addClass(Mi))
                      : (n.addClass(Mi),
                        n
                          .parents(Hi)
                          .prev(Wi + ", " + Ui)
                          .addClass(Mi),
                        n.parents(Hi).prev(Vi).children(Wi).addClass(Mi)),
                      m
                        .default(this._scrollElement)
                        .trigger(Fi, { relatedTarget: e });
                  }),
                  (t._clear = function () {
                    [].slice
                      .call(document.querySelectorAll(this._selector))
                      .filter(function (e) {
                        return e.classList.contains(Mi);
                      })
                      .forEach(function (e) {
                        return e.classList.remove(Mi);
                      });
                  }),
                  (e._jQueryInterface = function (t) {
                    return this.each(function () {
                      var n = m.default(this).data(Oi);
                      if (
                        (n ||
                          ((n = new e(this, "object" == typeof t && t)),
                          m.default(this).data(Oi, n)),
                        "string" == typeof t)
                      ) {
                        if (void 0 === n[t])
                          throw new TypeError('No method named "' + t + '"');
                        n[t]();
                      }
                    });
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return Ni;
                      },
                    },
                    {
                      key: "Default",
                      get: function () {
                        return Xi;
                      },
                    },
                  ]),
                  e
                );
              })();
            m.default(window).on(Pi, function () {
              for (
                var e = [].slice.call(document.querySelectorAll($i)),
                  t = e.length;
                t--;

              ) {
                var n = m.default(e[t]);
                Gi._jQueryInterface.call(n, n.data());
              }
            }),
              (m.default.fn[Si] = Gi._jQueryInterface),
              (m.default.fn[Si].Constructor = Gi),
              (m.default.fn[Si].noConflict = function () {
                return (m.default.fn[Si] = Li), Gi._jQueryInterface;
              });
            var Ji = "tab",
              Zi = "4.6.2",
              er = "bs.tab",
              tr = "." + er,
              nr = ".data-api",
              ir = m.default.fn[Ji],
              rr = "dropdown-menu",
              or = "active",
              sr = "disabled",
              ar = "fade",
              lr = "show",
              ur = "hide" + tr,
              cr = "hidden" + tr,
              dr = "show" + tr,
              fr = "shown" + tr,
              hr = "click" + tr + nr,
              pr = ".dropdown",
              mr = ".nav, .list-group",
              gr = ".active",
              vr = "> li > .active",
              yr =
                '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',
              br = ".dropdown-toggle",
              _r = "> .dropdown-menu .active",
              wr = (function () {
                function e(e) {
                  this._element = e;
                }
                var t = e.prototype;
                return (
                  (t.show = function () {
                    var e = this;
                    if (
                      !(
                        (this._element.parentNode &&
                          this._element.parentNode.nodeType ===
                            Node.ELEMENT_NODE &&
                          m.default(this._element).hasClass(or)) ||
                        m.default(this._element).hasClass(sr) ||
                        this._element.hasAttribute("disabled")
                      )
                    ) {
                      var t,
                        n,
                        i = m.default(this._element).closest(mr)[0],
                        r = _.getSelectorFromElement(this._element);
                      if (i) {
                        var o =
                          "UL" === i.nodeName || "OL" === i.nodeName ? vr : gr;
                        n = (n = m.default.makeArray(m.default(i).find(o)))[
                          n.length - 1
                        ];
                      }
                      var s = m.default.Event(ur, {
                          relatedTarget: this._element,
                        }),
                        a = m.default.Event(dr, { relatedTarget: n });
                      if (
                        (n && m.default(n).trigger(s),
                        m.default(this._element).trigger(a),
                        !a.isDefaultPrevented() && !s.isDefaultPrevented())
                      ) {
                        r && (t = document.querySelector(r)),
                          this._activate(this._element, i);
                        var l = function () {
                          var t = m.default.Event(cr, {
                              relatedTarget: e._element,
                            }),
                            i = m.default.Event(fr, { relatedTarget: n });
                          m.default(n).trigger(t),
                            m.default(e._element).trigger(i);
                        };
                        t ? this._activate(t, t.parentNode, l) : l();
                      }
                    }
                  }),
                  (t.dispose = function () {
                    m.default.removeData(this._element, er),
                      (this._element = null);
                  }),
                  (t._activate = function (e, t, n) {
                    var i = this,
                      r = (
                        !t || ("UL" !== t.nodeName && "OL" !== t.nodeName)
                          ? m.default(t).children(gr)
                          : m.default(t).find(vr)
                      )[0],
                      o = n && r && m.default(r).hasClass(ar),
                      s = function () {
                        return i._transitionComplete(e, r, n);
                      };
                    if (r && o) {
                      var a = _.getTransitionDurationFromElement(r);
                      m.default(r)
                        .removeClass(lr)
                        .one(_.TRANSITION_END, s)
                        .emulateTransitionEnd(a);
                    } else s();
                  }),
                  (t._transitionComplete = function (e, t, n) {
                    if (t) {
                      m.default(t).removeClass(or);
                      var i = m.default(t.parentNode).find(_r)[0];
                      i && m.default(i).removeClass(or),
                        "tab" === t.getAttribute("role") &&
                          t.setAttribute("aria-selected", !1);
                    }
                    m.default(e).addClass(or),
                      "tab" === e.getAttribute("role") &&
                        e.setAttribute("aria-selected", !0),
                      _.reflow(e),
                      e.classList.contains(ar) && e.classList.add(lr);
                    var r = e.parentNode;
                    if (
                      (r && "LI" === r.nodeName && (r = r.parentNode),
                      r && m.default(r).hasClass(rr))
                    ) {
                      var o = m.default(e).closest(pr)[0];
                      if (o) {
                        var s = [].slice.call(o.querySelectorAll(br));
                        m.default(s).addClass(or);
                      }
                      e.setAttribute("aria-expanded", !0);
                    }
                    n && n();
                  }),
                  (e._jQueryInterface = function (t) {
                    return this.each(function () {
                      var n = m.default(this),
                        i = n.data(er);
                      if (
                        (i || ((i = new e(this)), n.data(er, i)),
                        "string" == typeof t)
                      ) {
                        if (void 0 === i[t])
                          throw new TypeError('No method named "' + t + '"');
                        i[t]();
                      }
                    });
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return Zi;
                      },
                    },
                  ]),
                  e
                );
              })();
            m.default(document).on(hr, yr, function (e) {
              e.preventDefault(),
                wr._jQueryInterface.call(m.default(this), "show");
            }),
              (m.default.fn[Ji] = wr._jQueryInterface),
              (m.default.fn[Ji].Constructor = wr),
              (m.default.fn[Ji].noConflict = function () {
                return (m.default.fn[Ji] = ir), wr._jQueryInterface;
              });
            var Er = "toast",
              xr = "4.6.2",
              Tr = "bs.toast",
              Cr = "." + Tr,
              Ar = m.default.fn[Er],
              kr = "fade",
              Sr = "hide",
              Nr = "show",
              Or = "showing",
              Dr = "click.dismiss" + Cr,
              jr = "hide" + Cr,
              Lr = "hidden" + Cr,
              Ir = "show" + Cr,
              Mr = "shown" + Cr,
              Fr = '[data-dismiss="toast"]',
              qr = { animation: !0, autohide: !0, delay: 500 },
              Pr = {
                animation: "boolean",
                autohide: "boolean",
                delay: "number",
              },
              Rr = (function () {
                function e(e, t) {
                  (this._element = e),
                    (this._config = this._getConfig(t)),
                    (this._timeout = null),
                    this._setListeners();
                }
                var t = e.prototype;
                return (
                  (t.show = function () {
                    var e = this,
                      t = m.default.Event(Ir);
                    if (
                      (m.default(this._element).trigger(t),
                      !t.isDefaultPrevented())
                    ) {
                      this._clearTimeout(),
                        this._config.animation &&
                          this._element.classList.add(kr);
                      var n = function () {
                        e._element.classList.remove(Or),
                          e._element.classList.add(Nr),
                          m.default(e._element).trigger(Mr),
                          e._config.autohide &&
                            (e._timeout = setTimeout(function () {
                              e.hide();
                            }, e._config.delay));
                      };
                      if (
                        (this._element.classList.remove(Sr),
                        _.reflow(this._element),
                        this._element.classList.add(Or),
                        this._config.animation)
                      ) {
                        var i = _.getTransitionDurationFromElement(
                          this._element
                        );
                        m.default(this._element)
                          .one(_.TRANSITION_END, n)
                          .emulateTransitionEnd(i);
                      } else n();
                    }
                  }),
                  (t.hide = function () {
                    if (this._element.classList.contains(Nr)) {
                      var e = m.default.Event(jr);
                      m.default(this._element).trigger(e),
                        e.isDefaultPrevented() || this._close();
                    }
                  }),
                  (t.dispose = function () {
                    this._clearTimeout(),
                      this._element.classList.contains(Nr) &&
                        this._element.classList.remove(Nr),
                      m.default(this._element).off(Dr),
                      m.default.removeData(this._element, Tr),
                      (this._element = null),
                      (this._config = null);
                  }),
                  (t._getConfig = function (e) {
                    return (
                      (e = s(
                        {},
                        qr,
                        m.default(this._element).data(),
                        "object" == typeof e && e ? e : {}
                      )),
                      _.typeCheckConfig(Er, e, this.constructor.DefaultType),
                      e
                    );
                  }),
                  (t._setListeners = function () {
                    var e = this;
                    m.default(this._element).on(Dr, Fr, function () {
                      return e.hide();
                    });
                  }),
                  (t._close = function () {
                    var e = this,
                      t = function () {
                        e._element.classList.add(Sr),
                          m.default(e._element).trigger(Lr);
                      };
                    if (
                      (this._element.classList.remove(Nr),
                      this._config.animation)
                    ) {
                      var n = _.getTransitionDurationFromElement(this._element);
                      m.default(this._element)
                        .one(_.TRANSITION_END, t)
                        .emulateTransitionEnd(n);
                    } else t();
                  }),
                  (t._clearTimeout = function () {
                    clearTimeout(this._timeout), (this._timeout = null);
                  }),
                  (e._jQueryInterface = function (t) {
                    return this.each(function () {
                      var n = m.default(this),
                        i = n.data(Tr);
                      if (
                        (i ||
                          ((i = new e(this, "object" == typeof t && t)),
                          n.data(Tr, i)),
                        "string" == typeof t)
                      ) {
                        if (void 0 === i[t])
                          throw new TypeError('No method named "' + t + '"');
                        i[t](this);
                      }
                    });
                  }),
                  o(e, null, [
                    {
                      key: "VERSION",
                      get: function () {
                        return xr;
                      },
                    },
                    {
                      key: "DefaultType",
                      get: function () {
                        return Pr;
                      },
                    },
                    {
                      key: "Default",
                      get: function () {
                        return qr;
                      },
                    },
                  ]),
                  e
                );
              })();
            (m.default.fn[Er] = Rr._jQueryInterface),
              (m.default.fn[Er].Constructor = Rr),
              (m.default.fn[Er].noConflict = function () {
                return (m.default.fn[Er] = Ar), Rr._jQueryInterface;
              }),
              (e.Alert = I),
              (e.Button = ee),
              (e.Carousel = Ke),
              (e.Collapse = mt),
              (e.Dropdown = rn),
              (e.Modal = Rn),
              (e.Popover = ki),
              (e.Scrollspy = Gi),
              (e.Tab = wr),
              (e.Toast = Rr),
              (e.Tooltip = fi),
              (e.Util = _),
              Object.defineProperty(e, "__esModule", { value: !0 });
          }),
          "object" == typeof e && void 0 !== t
            ? i(e, Oe(), De())
            : "function" == typeof define && define.amd
            ? define(["exports", "jquery", "popper.js"], i)
            : i(
                ((n =
                  "undefined" != typeof globalThis
                    ? globalThis
                    : n || self).bootstrap = {}),
                n.jQuery,
                n.Popper
              );
      },
    }),
    Le = ke({
      "node_modules/jquery-validation/dist/jquery.validate.js"(e, t) {
        var n;
        (n = function (e) {
          e.extend(e.fn, {
            validate: function (t) {
              if (this.length) {
                var n = e.data(this[0], "validator");
                return (
                  n ||
                  (this.attr("novalidate", "novalidate"),
                  (n = new e.validator(t, this[0])),
                  e.data(this[0], "validator", n),
                  n.settings.onsubmit &&
                    (this.on("click.validate", ":submit", function (t) {
                      (n.submitButton = t.currentTarget),
                        e(this).hasClass("cancel") && (n.cancelSubmit = !0),
                        void 0 !== e(this).attr("formnovalidate") &&
                          (n.cancelSubmit = !0);
                    }),
                    this.on("submit.validate", function (t) {
                      function i() {
                        var i, r;
                        return (
                          n.submitButton &&
                            (n.settings.submitHandler || n.formSubmitted) &&
                            (i = e("<input type='hidden'/>")
                              .attr("name", n.submitButton.name)
                              .val(e(n.submitButton).val())
                              .appendTo(n.currentForm)),
                          !(n.settings.submitHandler && !n.settings.debug) ||
                            ((r = n.settings.submitHandler.call(
                              n,
                              n.currentForm,
                              t
                            )),
                            i && i.remove(),
                            void 0 !== r && r)
                        );
                      }
                      return (
                        n.settings.debug && t.preventDefault(),
                        n.cancelSubmit
                          ? ((n.cancelSubmit = !1), i())
                          : n.form()
                          ? n.pendingRequest
                            ? ((n.formSubmitted = !0), !1)
                            : i()
                          : (n.focusInvalid(), !1)
                      );
                    })),
                  n)
                );
              }
              t &&
                t.debug &&
                window.console &&
                console.warn(
                  "Nothing selected, can't validate, returning nothing."
                );
            },
            valid: function () {
              var t, n, i;
              return (
                e(this[0]).is("form")
                  ? (t = this.validate().form())
                  : ((i = []),
                    (t = !0),
                    (n = e(this[0].form).validate()),
                    this.each(function () {
                      (t = n.element(this) && t) || (i = i.concat(n.errorList));
                    }),
                    (n.errorList = i)),
                t
              );
            },
            rules: function (t, n) {
              var i,
                r,
                o,
                s,
                a,
                l,
                u = this[0],
                c =
                  void 0 !== this.attr("contenteditable") &&
                  "false" !== this.attr("contenteditable");
              if (
                null != u &&
                (!u.form &&
                  c &&
                  ((u.form = this.closest("form")[0]),
                  (u.name = this.attr("name"))),
                null != u.form)
              ) {
                if (t)
                  switch (
                    ((r = (i = e.data(u.form, "validator").settings).rules),
                    (o = e.validator.staticRules(u)),
                    t)
                  ) {
                    case "add":
                      e.extend(o, e.validator.normalizeRule(n)),
                        delete o.messages,
                        (r[u.name] = o),
                        n.messages &&
                          (i.messages[u.name] = e.extend(
                            i.messages[u.name],
                            n.messages
                          ));
                      break;
                    case "remove":
                      return n
                        ? ((l = {}),
                          e.each(n.split(/\s/), function (e, t) {
                            (l[t] = o[t]), delete o[t];
                          }),
                          l)
                        : (delete r[u.name], o);
                  }
                return (
                  (s = e.validator.normalizeRules(
                    e.extend(
                      {},
                      e.validator.classRules(u),
                      e.validator.attributeRules(u),
                      e.validator.dataRules(u),
                      e.validator.staticRules(u)
                    ),
                    u
                  )).required &&
                    ((a = s.required),
                    delete s.required,
                    (s = e.extend({ required: a }, s))),
                  s.remote &&
                    ((a = s.remote),
                    delete s.remote,
                    (s = e.extend(s, { remote: a }))),
                  s
                );
              }
            },
          });
          var t,
            n = function (e) {
              return e.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "");
            };
          e.extend(e.expr.pseudos || e.expr[":"], {
            blank: function (t) {
              return !n("" + e(t).val());
            },
            filled: function (t) {
              var i = e(t).val();
              return null !== i && !!n("" + i);
            },
            unchecked: function (t) {
              return !e(t).prop("checked");
            },
          }),
            (e.validator = function (t, n) {
              (this.settings = e.extend(!0, {}, e.validator.defaults, t)),
                (this.currentForm = n),
                this.init();
            }),
            (e.validator.format = function (t, n) {
              return 1 === arguments.length
                ? function () {
                    var n = e.makeArray(arguments);
                    return n.unshift(t), e.validator.format.apply(this, n);
                  }
                : (void 0 === n ||
                    (arguments.length > 2 &&
                      n.constructor !== Array &&
                      (n = e.makeArray(arguments).slice(1)),
                    n.constructor !== Array && (n = [n]),
                    e.each(n, function (e, n) {
                      t = t.replace(
                        new RegExp("\\{" + e + "\\}", "g"),
                        function () {
                          return n;
                        }
                      );
                    })),
                  t);
            }),
            e.extend(e.validator, {
              defaults: {
                messages: {},
                groups: {},
                rules: {},
                errorClass: "error",
                pendingClass: "pending",
                validClass: "valid",
                errorElement: "label",
                focusCleanup: !1,
                focusInvalid: !0,
                errorContainer: e([]),
                errorLabelContainer: e([]),
                onsubmit: !0,
                ignore: ":hidden",
                ignoreTitle: !1,
                onfocusin: function (e) {
                  (this.lastActive = e),
                    this.settings.focusCleanup &&
                      (this.settings.unhighlight &&
                        this.settings.unhighlight.call(
                          this,
                          e,
                          this.settings.errorClass,
                          this.settings.validClass
                        ),
                      this.hideThese(this.errorsFor(e)));
                },
                onfocusout: function (e) {
                  this.checkable(e) ||
                    (!(e.name in this.submitted) && this.optional(e)) ||
                    this.element(e);
                },
                onkeyup: function (t, n) {
                  var i = [
                    16, 17, 18, 20, 35, 36, 37, 38, 39, 40, 45, 144, 225,
                  ];
                  (9 === n.which && "" === this.elementValue(t)) ||
                    -1 !== e.inArray(n.keyCode, i) ||
                    ((t.name in this.submitted || t.name in this.invalid) &&
                      this.element(t));
                },
                onclick: function (e) {
                  e.name in this.submitted
                    ? this.element(e)
                    : e.parentNode.name in this.submitted &&
                      this.element(e.parentNode);
                },
                highlight: function (t, n, i) {
                  "radio" === t.type
                    ? this.findByName(t.name).addClass(n).removeClass(i)
                    : e(t).addClass(n).removeClass(i);
                },
                unhighlight: function (t, n, i) {
                  "radio" === t.type
                    ? this.findByName(t.name).removeClass(n).addClass(i)
                    : e(t).removeClass(n).addClass(i);
                },
              },
              setDefaults: function (t) {
                e.extend(e.validator.defaults, t);
              },
              messages: {
                required: "This field is required.",
                remote: "Please fix this field.",
                email: "Please enter a valid email address.",
                url: "Please enter a valid URL.",
                date: "Please enter a valid date.",
                dateISO: "Please enter a valid date (ISO).",
                number: "Please enter a valid number.",
                digits: "Please enter only digits.",
                equalTo: "Please enter the same value again.",
                maxlength: e.validator.format(
                  "Please enter no more than {0} characters."
                ),
                minlength: e.validator.format(
                  "Please enter at least {0} characters."
                ),
                rangelength: e.validator.format(
                  "Please enter a value between {0} and {1} characters long."
                ),
                range: e.validator.format(
                  "Please enter a value between {0} and {1}."
                ),
                max: e.validator.format(
                  "Please enter a value less than or equal to {0}."
                ),
                min: e.validator.format(
                  "Please enter a value greater than or equal to {0}."
                ),
                step: e.validator.format("Please enter a multiple of {0}."),
              },
              autoCreateRanges: !1,
              prototype: {
                init: function () {
                  function t(t) {
                    var n =
                      void 0 !== e(this).attr("contenteditable") &&
                      "false" !== e(this).attr("contenteditable");
                    if (
                      (!this.form &&
                        n &&
                        ((this.form = e(this).closest("form")[0]),
                        (this.name = e(this).attr("name"))),
                      i === this.form)
                    ) {
                      var r = e.data(this.form, "validator"),
                        o = "on" + t.type.replace(/^validate/, ""),
                        s = r.settings;
                      s[o] && !e(this).is(s.ignore) && s[o].call(r, this, t);
                    }
                  }
                  (this.labelContainer = e(this.settings.errorLabelContainer)),
                    (this.errorContext =
                      (this.labelContainer.length && this.labelContainer) ||
                      e(this.currentForm)),
                    (this.containers = e(this.settings.errorContainer).add(
                      this.settings.errorLabelContainer
                    )),
                    (this.submitted = {}),
                    (this.valueCache = {}),
                    (this.pendingRequest = 0),
                    (this.pending = {}),
                    (this.invalid = {}),
                    this.reset();
                  var n,
                    i = this.currentForm,
                    r = (this.groups = {});
                  e.each(this.settings.groups, function (t, n) {
                    "string" == typeof n && (n = n.split(/\s/)),
                      e.each(n, function (e, n) {
                        r[n] = t;
                      });
                  }),
                    (n = this.settings.rules),
                    e.each(n, function (t, i) {
                      n[t] = e.validator.normalizeRule(i);
                    }),
                    e(this.currentForm)
                      .on(
                        "focusin.validate focusout.validate keyup.validate",
                        ":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'], [type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'], [type='radio'], [type='checkbox'], [contenteditable], [type='button']",
                        t
                      )
                      .on(
                        "click.validate",
                        "select, option, [type='radio'], [type='checkbox']",
                        t
                      ),
                    this.settings.invalidHandler &&
                      e(this.currentForm).on(
                        "invalid-form.validate",
                        this.settings.invalidHandler
                      );
                },
                form: function () {
                  return (
                    this.checkForm(),
                    e.extend(this.submitted, this.errorMap),
                    (this.invalid = e.extend({}, this.errorMap)),
                    this.valid() ||
                      e(this.currentForm).triggerHandler("invalid-form", [
                        this,
                      ]),
                    this.showErrors(),
                    this.valid()
                  );
                },
                checkForm: function () {
                  this.prepareForm();
                  for (
                    var e = 0, t = (this.currentElements = this.elements());
                    t[e];
                    e++
                  )
                    this.check(t[e]);
                  return this.valid();
                },
                element: function (t) {
                  var n,
                    i,
                    r = this.clean(t),
                    o = this.validationTargetFor(r),
                    s = this,
                    a = !0;
                  return (
                    void 0 === o
                      ? delete this.invalid[r.name]
                      : (this.prepareElement(o),
                        (this.currentElements = e(o)),
                        (i = this.groups[o.name]) &&
                          e.each(this.groups, function (e, t) {
                            t === i &&
                              e !== o.name &&
                              (r = s.validationTargetFor(
                                s.clean(s.findByName(e))
                              )) &&
                              r.name in s.invalid &&
                              (s.currentElements.push(r),
                              (a = s.check(r) && a));
                          }),
                        (n = !1 !== this.check(o)),
                        (a = a && n),
                        (this.invalid[o.name] = !n),
                        this.numberOfInvalids() ||
                          (this.toHide = this.toHide.add(this.containers)),
                        this.showErrors(),
                        e(t).attr("aria-invalid", !n)),
                    a
                  );
                },
                showErrors: function (t) {
                  if (t) {
                    var n = this;
                    e.extend(this.errorMap, t),
                      (this.errorList = e.map(this.errorMap, function (e, t) {
                        return { message: e, element: n.findByName(t)[0] };
                      })),
                      (this.successList = e.grep(
                        this.successList,
                        function (e) {
                          return !(e.name in t);
                        }
                      ));
                  }
                  this.settings.showErrors
                    ? this.settings.showErrors.call(
                        this,
                        this.errorMap,
                        this.errorList
                      )
                    : this.defaultShowErrors();
                },
                resetForm: function () {
                  e.fn.resetForm && e(this.currentForm).resetForm(),
                    (this.invalid = {}),
                    (this.submitted = {}),
                    this.prepareForm(),
                    this.hideErrors();
                  var t = this.elements()
                    .removeData("previousValue")
                    .removeAttr("aria-invalid");
                  this.resetElements(t);
                },
                resetElements: function (e) {
                  var t;
                  if (this.settings.unhighlight)
                    for (t = 0; e[t]; t++)
                      this.settings.unhighlight.call(
                        this,
                        e[t],
                        this.settings.errorClass,
                        ""
                      ),
                        this.findByName(e[t].name).removeClass(
                          this.settings.validClass
                        );
                  else
                    e.removeClass(this.settings.errorClass).removeClass(
                      this.settings.validClass
                    );
                },
                numberOfInvalids: function () {
                  return this.objectLength(this.invalid);
                },
                objectLength: function (e) {
                  var t,
                    n = 0;
                  for (t in e)
                    void 0 !== e[t] && null !== e[t] && !1 !== e[t] && n++;
                  return n;
                },
                hideErrors: function () {
                  this.hideThese(this.toHide);
                },
                hideThese: function (e) {
                  e.not(this.containers).text(""), this.addWrapper(e).hide();
                },
                valid: function () {
                  return 0 === this.size();
                },
                size: function () {
                  return this.errorList.length;
                },
                focusInvalid: function () {
                  if (this.settings.focusInvalid)
                    try {
                      e(
                        this.findLastActive() ||
                          (this.errorList.length &&
                            this.errorList[0].element) ||
                          []
                      )
                        .filter(":visible")
                        .trigger("focus")
                        .trigger("focusin");
                    } catch (e) {}
                },
                findLastActive: function () {
                  var t = this.lastActive;
                  return (
                    t &&
                    1 ===
                      e.grep(this.errorList, function (e) {
                        return e.element.name === t.name;
                      }).length &&
                    t
                  );
                },
                elements: function () {
                  var t = this,
                    n = {};
                  return e(this.currentForm)
                    .find("input, select, textarea, [contenteditable]")
                    .not(":submit, :reset, :image, :disabled")
                    .not(this.settings.ignore)
                    .filter(function () {
                      var i = this.name || e(this).attr("name"),
                        r =
                          void 0 !== e(this).attr("contenteditable") &&
                          "false" !== e(this).attr("contenteditable");
                      return (
                        !i &&
                          t.settings.debug &&
                          window.console &&
                          console.error("%o has no name assigned", this),
                        r &&
                          ((this.form = e(this).closest("form")[0]),
                          (this.name = i)),
                        !(
                          this.form !== t.currentForm ||
                          i in n ||
                          !t.objectLength(e(this).rules()) ||
                          ((n[i] = !0), 0)
                        )
                      );
                    });
                },
                clean: function (t) {
                  return e(t)[0];
                },
                errors: function () {
                  var t = this.settings.errorClass.split(" ").join(".");
                  return e(
                    this.settings.errorElement + "." + t,
                    this.errorContext
                  );
                },
                resetInternals: function () {
                  (this.successList = []),
                    (this.errorList = []),
                    (this.errorMap = {}),
                    (this.toShow = e([])),
                    (this.toHide = e([]));
                },
                reset: function () {
                  this.resetInternals(), (this.currentElements = e([]));
                },
                prepareForm: function () {
                  this.reset(),
                    (this.toHide = this.errors().add(this.containers));
                },
                prepareElement: function (e) {
                  this.reset(), (this.toHide = this.errorsFor(e));
                },
                elementValue: function (t) {
                  var n,
                    i,
                    r = e(t),
                    o = t.type,
                    s =
                      void 0 !== r.attr("contenteditable") &&
                      "false" !== r.attr("contenteditable");
                  return "radio" === o || "checkbox" === o
                    ? this.findByName(t.name).filter(":checked").val()
                    : "number" === o && void 0 !== t.validity
                    ? t.validity.badInput
                      ? "NaN"
                      : r.val()
                    : ((n = s ? r.text() : r.val()),
                      "file" === o
                        ? "C:\\fakepath\\" === n.substr(0, 12)
                          ? n.substr(12)
                          : (i = n.lastIndexOf("/")) >= 0 ||
                            (i = n.lastIndexOf("\\")) >= 0
                          ? n.substr(i + 1)
                          : n
                        : "string" == typeof n
                        ? n.replace(/\r/g, "")
                        : n);
                },
                check: function (t) {
                  t = this.validationTargetFor(this.clean(t));
                  var n,
                    i,
                    r,
                    o,
                    s = e(t).rules(),
                    a = e.map(s, function (e, t) {
                      return t;
                    }).length,
                    l = !1,
                    u = this.elementValue(t);
                  for (i in ("function" == typeof s.normalizer
                    ? (o = s.normalizer)
                    : "function" == typeof this.settings.normalizer &&
                      (o = this.settings.normalizer),
                  o && ((u = o.call(t, u)), delete s.normalizer),
                  s)) {
                    r = { method: i, parameters: s[i] };
                    try {
                      if (
                        "dependency-mismatch" ===
                          (n = e.validator.methods[i].call(
                            this,
                            u,
                            t,
                            r.parameters
                          )) &&
                        1 === a
                      ) {
                        l = !0;
                        continue;
                      }
                      if (((l = !1), "pending" === n))
                        return void (this.toHide = this.toHide.not(
                          this.errorsFor(t)
                        ));
                      if (!n) return this.formatAndAdd(t, r), !1;
                    } catch (e) {
                      throw (
                        (this.settings.debug &&
                          window.console &&
                          console.log(
                            "Exception occurred when checking element " +
                              t.id +
                              ", check the '" +
                              r.method +
                              "' method.",
                            e
                          ),
                        e instanceof TypeError &&
                          (e.message +=
                            ".  Exception occurred when checking element " +
                            t.id +
                            ", check the '" +
                            r.method +
                            "' method."),
                        e)
                      );
                    }
                  }
                  if (!l)
                    return this.objectLength(s) && this.successList.push(t), !0;
                },
                customDataMessage: function (t, n) {
                  return (
                    e(t).data(
                      "msg" +
                        n.charAt(0).toUpperCase() +
                        n.substring(1).toLowerCase()
                    ) || e(t).data("msg")
                  );
                },
                customMessage: function (e, t) {
                  var n = this.settings.messages[e];
                  return n && (n.constructor === String ? n : n[t]);
                },
                findDefined: function () {
                  for (var e = 0; e < arguments.length; e++)
                    if (void 0 !== arguments[e]) return arguments[e];
                },
                defaultMessage: function (t, n) {
                  "string" == typeof n && (n = { method: n });
                  var i = this.findDefined(
                      this.customMessage(t.name, n.method),
                      this.customDataMessage(t, n.method),
                      (!this.settings.ignoreTitle && t.title) || void 0,
                      e.validator.messages[n.method],
                      "<strong>Warning: No message defined for " +
                        t.name +
                        "</strong>"
                    ),
                    r = /\$?\{(\d+)\}/g;
                  return (
                    "function" == typeof i
                      ? (i = i.call(this, n.parameters, t))
                      : r.test(i) &&
                        (i = e.validator.format(
                          i.replace(r, "{$1}"),
                          n.parameters
                        )),
                    i
                  );
                },
                formatAndAdd: function (e, t) {
                  var n = this.defaultMessage(e, t);
                  this.errorList.push({
                    message: n,
                    element: e,
                    method: t.method,
                  }),
                    (this.errorMap[e.name] = n),
                    (this.submitted[e.name] = n);
                },
                addWrapper: function (e) {
                  return (
                    this.settings.wrapper &&
                      (e = e.add(e.parent(this.settings.wrapper))),
                    e
                  );
                },
                defaultShowErrors: function () {
                  var e, t, n;
                  for (e = 0; this.errorList[e]; e++)
                    (n = this.errorList[e]),
                      this.settings.highlight &&
                        this.settings.highlight.call(
                          this,
                          n.element,
                          this.settings.errorClass,
                          this.settings.validClass
                        ),
                      this.showLabel(n.element, n.message);
                  if (
                    (this.errorList.length &&
                      (this.toShow = this.toShow.add(this.containers)),
                    this.settings.success)
                  )
                    for (e = 0; this.successList[e]; e++)
                      this.showLabel(this.successList[e]);
                  if (this.settings.unhighlight)
                    for (e = 0, t = this.validElements(); t[e]; e++)
                      this.settings.unhighlight.call(
                        this,
                        t[e],
                        this.settings.errorClass,
                        this.settings.validClass
                      );
                  (this.toHide = this.toHide.not(this.toShow)),
                    this.hideErrors(),
                    this.addWrapper(this.toShow).show();
                },
                validElements: function () {
                  return this.currentElements.not(this.invalidElements());
                },
                invalidElements: function () {
                  return e(this.errorList).map(function () {
                    return this.element;
                  });
                },
                showLabel: function (t, n) {
                  var i,
                    r,
                    o,
                    s,
                    a = this.errorsFor(t),
                    l = this.idOrName(t),
                    u = e(t).attr("aria-describedby");
                  a.length
                    ? (a
                        .removeClass(this.settings.validClass)
                        .addClass(this.settings.errorClass),
                      a.html(n))
                    : ((i = a =
                        e("<" + this.settings.errorElement + ">")
                          .attr("id", l + "-error")
                          .addClass(this.settings.errorClass)
                          .html(n || "")),
                      this.settings.wrapper &&
                        (i = a
                          .hide()
                          .show()
                          .wrap("<" + this.settings.wrapper + "/>")
                          .parent()),
                      this.labelContainer.length
                        ? this.labelContainer.append(i)
                        : this.settings.errorPlacement
                        ? this.settings.errorPlacement.call(this, i, e(t))
                        : i.insertAfter(t),
                      a.is("label")
                        ? a.attr("for", l)
                        : 0 ===
                            a.parents(
                              "label[for='" + this.escapeCssMeta(l) + "']"
                            ).length &&
                          ((o = a.attr("id")),
                          u
                            ? u.match(
                                new RegExp(
                                  "\\b" + this.escapeCssMeta(o) + "\\b"
                                )
                              ) || (u += " " + o)
                            : (u = o),
                          e(t).attr("aria-describedby", u),
                          (r = this.groups[t.name]) &&
                            ((s = this),
                            e.each(s.groups, function (t, n) {
                              n === r &&
                                e(
                                  "[name='" + s.escapeCssMeta(t) + "']",
                                  s.currentForm
                                ).attr("aria-describedby", a.attr("id"));
                            })))),
                    !n &&
                      this.settings.success &&
                      (a.text(""),
                      "string" == typeof this.settings.success
                        ? a.addClass(this.settings.success)
                        : this.settings.success(a, t)),
                    (this.toShow = this.toShow.add(a));
                },
                errorsFor: function (t) {
                  var n = this.escapeCssMeta(this.idOrName(t)),
                    i = e(t).attr("aria-describedby"),
                    r = "label[for='" + n + "'], label[for='" + n + "'] *";
                  return (
                    i &&
                      (r =
                        r +
                        ", #" +
                        this.escapeCssMeta(i).replace(/\s+/g, ", #")),
                    this.errors().filter(r)
                  );
                },
                escapeCssMeta: function (e) {
                  return void 0 === e
                    ? ""
                    : e.replace(
                        /([\\!"#$%&'()*+,./:;<=>?@\[\]^`{|}~])/g,
                        "\\$1"
                      );
                },
                idOrName: function (e) {
                  return (
                    this.groups[e.name] ||
                    (this.checkable(e) ? e.name : e.id || e.name)
                  );
                },
                validationTargetFor: function (t) {
                  return (
                    this.checkable(t) && (t = this.findByName(t.name)),
                    e(t).not(this.settings.ignore)[0]
                  );
                },
                checkable: function (e) {
                  return /radio|checkbox/i.test(e.type);
                },
                findByName: function (t) {
                  return e(this.currentForm).find(
                    "[name='" + this.escapeCssMeta(t) + "']"
                  );
                },
                getLength: function (t, n) {
                  switch (n.nodeName.toLowerCase()) {
                    case "select":
                      return e("option:selected", n).length;
                    case "input":
                      if (this.checkable(n))
                        return this.findByName(n.name).filter(":checked")
                          .length;
                  }
                  return t.length;
                },
                depend: function (e, t) {
                  return (
                    !this.dependTypes[typeof e] ||
                    this.dependTypes[typeof e](e, t)
                  );
                },
                dependTypes: {
                  boolean: function (e) {
                    return e;
                  },
                  string: function (t, n) {
                    return !!e(t, n.form).length;
                  },
                  function: function (e, t) {
                    return e(t);
                  },
                },
                optional: function (t) {
                  var n = this.elementValue(t);
                  return (
                    !e.validator.methods.required.call(this, n, t) &&
                    "dependency-mismatch"
                  );
                },
                startRequest: function (t) {
                  this.pending[t.name] ||
                    (this.pendingRequest++,
                    e(t).addClass(this.settings.pendingClass),
                    (this.pending[t.name] = !0));
                },
                stopRequest: function (t, n) {
                  this.pendingRequest--,
                    this.pendingRequest < 0 && (this.pendingRequest = 0),
                    delete this.pending[t.name],
                    e(t).removeClass(this.settings.pendingClass),
                    n &&
                    0 === this.pendingRequest &&
                    this.formSubmitted &&
                    this.form() &&
                    0 === this.pendingRequest
                      ? (e(this.currentForm).trigger("submit"),
                        this.submitButton &&
                          e(
                            "input:hidden[name='" +
                              this.submitButton.name +
                              "']",
                            this.currentForm
                          ).remove(),
                        (this.formSubmitted = !1))
                      : !n &&
                        0 === this.pendingRequest &&
                        this.formSubmitted &&
                        (e(this.currentForm).triggerHandler("invalid-form", [
                          this,
                        ]),
                        (this.formSubmitted = !1));
                },
                previousValue: function (t, n) {
                  return (
                    (n = ("string" == typeof n && n) || "remote"),
                    e.data(t, "previousValue") ||
                      e.data(t, "previousValue", {
                        old: null,
                        valid: !0,
                        message: this.defaultMessage(t, { method: n }),
                      })
                  );
                },
                destroy: function () {
                  this.resetForm(),
                    e(this.currentForm)
                      .off(".validate")
                      .removeData("validator")
                      .find(".validate-equalTo-blur")
                      .off(".validate-equalTo")
                      .removeClass("validate-equalTo-blur")
                      .find(".validate-lessThan-blur")
                      .off(".validate-lessThan")
                      .removeClass("validate-lessThan-blur")
                      .find(".validate-lessThanEqual-blur")
                      .off(".validate-lessThanEqual")
                      .removeClass("validate-lessThanEqual-blur")
                      .find(".validate-greaterThanEqual-blur")
                      .off(".validate-greaterThanEqual")
                      .removeClass("validate-greaterThanEqual-blur")
                      .find(".validate-greaterThan-blur")
                      .off(".validate-greaterThan")
                      .removeClass("validate-greaterThan-blur");
                },
              },
              classRuleSettings: {
                required: { required: !0 },
                email: { email: !0 },
                url: { url: !0 },
                date: { date: !0 },
                dateISO: { dateISO: !0 },
                number: { number: !0 },
                digits: { digits: !0 },
                creditcard: { creditcard: !0 },
              },
              addClassRules: function (t, n) {
                t.constructor === String
                  ? (this.classRuleSettings[t] = n)
                  : e.extend(this.classRuleSettings, t);
              },
              classRules: function (t) {
                var n = {},
                  i = e(t).attr("class");
                return (
                  i &&
                    e.each(i.split(" "), function () {
                      this in e.validator.classRuleSettings &&
                        e.extend(n, e.validator.classRuleSettings[this]);
                    }),
                  n
                );
              },
              normalizeAttributeRule: function (e, t, n, i) {
                /min|max|step/.test(n) &&
                  (null === t || /number|range|text/.test(t)) &&
                  ((i = Number(i)), isNaN(i) && (i = void 0)),
                  i || 0 === i
                    ? (e[n] = i)
                    : t === n &&
                      "range" !== t &&
                      (e["date" === t ? "dateISO" : n] = !0);
              },
              attributeRules: function (t) {
                var n,
                  i,
                  r = {},
                  o = e(t),
                  s = t.getAttribute("type");
                for (n in e.validator.methods)
                  "required" === n
                    ? ("" === (i = t.getAttribute(n)) && (i = !0), (i = !!i))
                    : (i = o.attr(n)),
                    this.normalizeAttributeRule(r, s, n, i);
                return (
                  r.maxlength &&
                    /-1|2147483647|524288/.test(r.maxlength) &&
                    delete r.maxlength,
                  r
                );
              },
              dataRules: function (t) {
                var n,
                  i,
                  r = {},
                  o = e(t),
                  s = t.getAttribute("type");
                for (n in e.validator.methods)
                  "" ===
                    (i = o.data(
                      "rule" +
                        n.charAt(0).toUpperCase() +
                        n.substring(1).toLowerCase()
                    )) && (i = !0),
                    this.normalizeAttributeRule(r, s, n, i);
                return r;
              },
              staticRules: function (t) {
                var n = {},
                  i = e.data(t.form, "validator");
                return (
                  i.settings.rules &&
                    (n =
                      e.validator.normalizeRule(i.settings.rules[t.name]) ||
                      {}),
                  n
                );
              },
              normalizeRules: function (t, n) {
                return (
                  e.each(t, function (i, r) {
                    if (!1 !== r) {
                      if (r.param || r.depends) {
                        var o = !0;
                        switch (typeof r.depends) {
                          case "string":
                            o = !!e(r.depends, n.form).length;
                            break;
                          case "function":
                            o = r.depends.call(n, n);
                        }
                        o
                          ? (t[i] = void 0 === r.param || r.param)
                          : (e.data(n.form, "validator").resetElements(e(n)),
                            delete t[i]);
                      }
                    } else delete t[i];
                  }),
                  e.each(t, function (e, i) {
                    t[e] =
                      "function" == typeof i && "normalizer" !== e ? i(n) : i;
                  }),
                  e.each(["minlength", "maxlength"], function () {
                    t[this] && (t[this] = Number(t[this]));
                  }),
                  e.each(["rangelength", "range"], function () {
                    var e;
                    t[this] &&
                      (Array.isArray(t[this])
                        ? (t[this] = [Number(t[this][0]), Number(t[this][1])])
                        : "string" == typeof t[this] &&
                          ((e = t[this].replace(/[\[\]]/g, "").split(/[\s,]+/)),
                          (t[this] = [Number(e[0]), Number(e[1])])));
                  }),
                  e.validator.autoCreateRanges &&
                    (null != t.min &&
                      null != t.max &&
                      ((t.range = [t.min, t.max]), delete t.min, delete t.max),
                    null != t.minlength &&
                      null != t.maxlength &&
                      ((t.rangelength = [t.minlength, t.maxlength]),
                      delete t.minlength,
                      delete t.maxlength)),
                  t
                );
              },
              normalizeRule: function (t) {
                if ("string" == typeof t) {
                  var n = {};
                  e.each(t.split(/\s/), function () {
                    n[this] = !0;
                  }),
                    (t = n);
                }
                return t;
              },
              addMethod: function (t, n, i) {
                (e.validator.methods[t] = n),
                  (e.validator.messages[t] =
                    void 0 !== i ? i : e.validator.messages[t]),
                  n.length < 3 &&
                    e.validator.addClassRules(t, e.validator.normalizeRule(t));
              },
              methods: {
                required: function (t, n, i) {
                  if (!this.depend(i, n)) return "dependency-mismatch";
                  if ("select" === n.nodeName.toLowerCase()) {
                    var r = e(n).val();
                    return r && r.length > 0;
                  }
                  return this.checkable(n)
                    ? this.getLength(t, n) > 0
                    : null != t && t.length > 0;
                },
                email: function (e, t) {
                  return (
                    this.optional(t) ||
                    /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(
                      e
                    )
                  );
                },
                url: function (e, t) {
                  return (
                    this.optional(t) ||
                    /^(?:(?:(?:https?|ftp):)?\/\/)(?:(?:[^\]\[?\/<~#`!@$^&*()+=}|:";',>{ ]|%[0-9A-Fa-f]{2})+(?::(?:[^\]\[?\/<~#`!@$^&*()+=}|:";',>{ ]|%[0-9A-Fa-f]{2})*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z0-9\u00a1-\uffff][a-z0-9\u00a1-\uffff_-]{0,62})?[a-z0-9\u00a1-\uffff]\.)+(?:[a-z\u00a1-\uffff]{2,}\.?))(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(
                      e
                    )
                  );
                },
                date:
                  ((t = !1),
                  function (e, n) {
                    return (
                      t ||
                        ((t = !0),
                        this.settings.debug &&
                          window.console &&
                          console.warn(
                            "The `date` method is deprecated and will be removed in version '2.0.0'.\nPlease don't use it, since it relies on the Date constructor, which\nbehaves very differently across browsers and locales. Use `dateISO`\ninstead or one of the locale specific methods in `localizations/`\nand `additional-methods.js`."
                          )),
                      this.optional(n) ||
                        !/Invalid|NaN/.test(new Date(e).toString())
                    );
                  }),
                dateISO: function (e, t) {
                  return (
                    this.optional(t) ||
                    /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(
                      e
                    )
                  );
                },
                number: function (e, t) {
                  return (
                    this.optional(t) ||
                    /^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(e)
                  );
                },
                digits: function (e, t) {
                  return this.optional(t) || /^\d+$/.test(e);
                },
                minlength: function (e, t, n) {
                  var i = Array.isArray(e) ? e.length : this.getLength(e, t);
                  return this.optional(t) || i >= n;
                },
                maxlength: function (e, t, n) {
                  var i = Array.isArray(e) ? e.length : this.getLength(e, t);
                  return this.optional(t) || i <= n;
                },
                rangelength: function (e, t, n) {
                  var i = Array.isArray(e) ? e.length : this.getLength(e, t);
                  return this.optional(t) || (i >= n[0] && i <= n[1]);
                },
                min: function (e, t, n) {
                  return this.optional(t) || e >= n;
                },
                max: function (e, t, n) {
                  return this.optional(t) || e <= n;
                },
                range: function (e, t, n) {
                  return this.optional(t) || (e >= n[0] && e <= n[1]);
                },
                step: function (t, n, i) {
                  var r,
                    o = e(n).attr("type"),
                    s =
                      "Step attribute on input type " +
                      o +
                      " is not supported.",
                    a = ["text", "number", "range"],
                    l = new RegExp("\\b" + o + "\\b"),
                    u = function (e) {
                      var t = ("" + e).match(/(?:\.(\d+))?$/);
                      return t && t[1] ? t[1].length : 0;
                    },
                    c = function (e) {
                      return Math.round(e * Math.pow(10, r));
                    },
                    d = !0;
                  if (o && !l.test(a.join())) throw new Error(s);
                  return (
                    (r = u(i)),
                    (u(t) > r || c(t) % c(i) != 0) && (d = !1),
                    this.optional(n) || d
                  );
                },
                equalTo: function (t, n, i) {
                  var r = e(i);
                  return (
                    this.settings.onfocusout &&
                      r.not(".validate-equalTo-blur").length &&
                      r
                        .addClass("validate-equalTo-blur")
                        .on("blur.validate-equalTo", function () {
                          e(n).valid();
                        }),
                    t === r.val()
                  );
                },
                remote: function (t, n, i, r) {
                  if (this.optional(n)) return "dependency-mismatch";
                  r = ("string" == typeof r && r) || "remote";
                  var o,
                    s,
                    a,
                    l = this.previousValue(n, r);
                  return (
                    this.settings.messages[n.name] ||
                      (this.settings.messages[n.name] = {}),
                    (l.originalMessage =
                      l.originalMessage || this.settings.messages[n.name][r]),
                    (this.settings.messages[n.name][r] = l.message),
                    (i = ("string" == typeof i && { url: i }) || i),
                    (a = e.param(e.extend({ data: t }, i.data))),
                    l.old === a
                      ? l.valid
                      : ((l.old = a),
                        (o = this),
                        this.startRequest(n),
                        ((s = {})[n.name] = t),
                        e.ajax(
                          e.extend(
                            !0,
                            {
                              mode: "abort",
                              port: "validate" + n.name,
                              dataType: "json",
                              data: s,
                              context: o.currentForm,
                              success: function (e) {
                                var i,
                                  s,
                                  a,
                                  u = !0 === e || "true" === e;
                                (o.settings.messages[n.name][r] =
                                  l.originalMessage),
                                  u
                                    ? ((a = o.formSubmitted),
                                      o.resetInternals(),
                                      (o.toHide = o.errorsFor(n)),
                                      (o.formSubmitted = a),
                                      o.successList.push(n),
                                      (o.invalid[n.name] = !1),
                                      o.showErrors())
                                    : ((i = {}),
                                      (s =
                                        e ||
                                        o.defaultMessage(n, {
                                          method: r,
                                          parameters: t,
                                        })),
                                      (i[n.name] = l.message = s),
                                      (o.invalid[n.name] = !0),
                                      o.showErrors(i)),
                                  (l.valid = u),
                                  o.stopRequest(n, u);
                              },
                            },
                            i
                          )
                        ),
                        "pending")
                  );
                },
              },
            });
          var i,
            r = {};
          return (
            e.ajaxPrefilter
              ? e.ajaxPrefilter(function (e, t, n) {
                  var i = e.port;
                  "abort" === e.mode && (r[i] && r[i].abort(), (r[i] = n));
                })
              : ((i = e.ajax),
                (e.ajax = function (t) {
                  var n = ("mode" in t ? t : e.ajaxSettings).mode,
                    o = ("port" in t ? t : e.ajaxSettings).port;
                  return "abort" === n
                    ? (r[o] && r[o].abort(),
                      (r[o] = i.apply(this, arguments)),
                      r[o])
                    : i.apply(this, arguments);
                })),
            e
          );
        }),
          "function" == typeof define && define.amd
            ? define(["jquery"], n)
            : "object" == typeof t && t.exports
            ? (t.exports = n(Oe()))
            : n(jQuery);
      },
    }),
    Ie =
      (Ne(je()),
      class {
        constructor(e, t, n) {
          (this.eventTarget = e),
            (this.eventName = t),
            (this.eventOptions = n),
            (this.unorderedBindings = new Set());
        }
        connect() {
          this.eventTarget.addEventListener(
            this.eventName,
            this,
            this.eventOptions
          );
        }
        disconnect() {
          this.eventTarget.removeEventListener(
            this.eventName,
            this,
            this.eventOptions
          );
        }
        bindingConnected(e) {
          this.unorderedBindings.add(e);
        }
        bindingDisconnected(e) {
          this.unorderedBindings.delete(e);
        }
        handleEvent(t) {
          const n = e(t);
          for (const e of this.bindings) {
            if (n.immediatePropagationStopped) break;
            e.handleEvent(n);
          }
        }
        get bindings() {
          return Array.from(this.unorderedBindings).sort((e, t) => {
            const n = e.index,
              i = t.index;
            return n < i ? -1 : n > i ? 1 : 0;
          });
        }
      }),
    Me = class {
      constructor(e) {
        (this.application = e),
          (this.eventListenerMaps = new Map()),
          (this.started = !1);
      }
      start() {
        this.started ||
          ((this.started = !0),
          this.eventListeners.forEach((e) => e.connect()));
      }
      stop() {
        this.started &&
          ((this.started = !1),
          this.eventListeners.forEach((e) => e.disconnect()));
      }
      get eventListeners() {
        return Array.from(this.eventListenerMaps.values()).reduce(
          (e, t) => e.concat(Array.from(t.values())),
          []
        );
      }
      bindingConnected(e) {
        this.fetchEventListenerForBinding(e).bindingConnected(e);
      }
      bindingDisconnected(e) {
        this.fetchEventListenerForBinding(e).bindingDisconnected(e);
      }
      handleError(e, t, n = {}) {
        this.application.handleError(e, `Error ${t}`, n);
      }
      fetchEventListenerForBinding(e) {
        const { eventTarget: t, eventName: n, eventOptions: i } = e;
        return this.fetchEventListener(t, n, i);
      }
      fetchEventListener(e, t, n) {
        const i = this.fetchEventListenerMapForEventTarget(e),
          r = this.cacheKey(t, n);
        let o = i.get(r);
        return o || ((o = this.createEventListener(e, t, n)), i.set(r, o)), o;
      }
      createEventListener(e, t, n) {
        const i = new Ie(e, t, n);
        return this.started && i.connect(), i;
      }
      fetchEventListenerMapForEventTarget(e) {
        let t = this.eventListenerMaps.get(e);
        return t || ((t = new Map()), this.eventListenerMaps.set(e, t)), t;
      }
      cacheKey(e, t) {
        const n = [e];
        return (
          Object.keys(t)
            .sort()
            .forEach((e) => {
              n.push(`${t[e] ? "" : "!"}${e}`);
            }),
          n.join(":")
        );
      }
    },
    Fe = /^((.+?)(@(window|document))?->)?(.+?)(#([^:]+?))(:(.+))?$/,
    qe = class {
      constructor(e, t, n) {
        (this.element = e),
          (this.index = t),
          (this.eventTarget = n.eventTarget || e),
          (this.eventName = n.eventName || u(e) || c("missing event name")),
          (this.eventOptions = n.eventOptions || {}),
          (this.identifier = n.identifier || c("missing identifier")),
          (this.methodName = n.methodName || c("missing method name"));
      }
      static forToken(e) {
        return new this(e.element, e.index, t(e.content));
      }
      toString() {
        const e = this.eventTargetName ? `@${this.eventTargetName}` : "";
        return `${this.eventName}${e}->${this.identifier}#${this.methodName}`;
      }
      get params() {
        return this.eventTarget instanceof Element
          ? this.getParamsFromEventTargetAttributes(this.eventTarget)
          : {};
      }
      getParamsFromEventTargetAttributes(e) {
        const t = {},
          n = new RegExp(`^data-${this.identifier}-(.+)-param$`);
        return (
          Array.from(e.attributes).forEach(({ name: e, value: i }) => {
            const r = e.match(n),
              s = r && r[1];
            s && Object.assign(t, { [o(s)]: d(i) });
          }),
          t
        );
      }
      get eventTargetName() {
        return r(this.eventTarget);
      }
    },
    Pe = {
      a: () => "click",
      button: () => "click",
      form: () => "submit",
      details: () => "toggle",
      input: (e) => ("submit" == e.getAttribute("type") ? "click" : "input"),
      select: () => "change",
      textarea: () => "input",
    },
    Re = class {
      constructor(e, t) {
        (this.context = e), (this.action = t);
      }
      get index() {
        return this.action.index;
      }
      get eventTarget() {
        return this.action.eventTarget;
      }
      get eventOptions() {
        return this.action.eventOptions;
      }
      get identifier() {
        return this.context.identifier;
      }
      handleEvent(e) {
        this.willBeInvokedByEvent(e) && this.invokeWithEvent(e);
      }
      get eventName() {
        return this.action.eventName;
      }
      get method() {
        const e = this.controller[this.methodName];
        if ("function" == typeof e) return e;
        throw new Error(
          `Action "${this.action}" references undefined method "${this.methodName}"`
        );
      }
      invokeWithEvent(e) {
        const { target: t, currentTarget: n } = e;
        try {
          const { params: i } = this.action,
            r = Object.assign(e, { params: i });
          this.method.call(this.controller, r),
            this.context.logDebugActivity(this.methodName, {
              event: e,
              target: t,
              currentTarget: n,
              action: this.methodName,
            });
        } catch (t) {
          const { identifier: n, controller: i, element: r, index: o } = this,
            s = {
              identifier: n,
              controller: i,
              element: r,
              index: o,
              event: e,
            };
          this.context.handleError(t, `invoking action "${this.action}"`, s);
        }
      }
      willBeInvokedByEvent(e) {
        const t = e.target;
        return (
          this.element === t ||
          (t instanceof Element && this.element.contains(t)
            ? this.scope.containsElement(t)
            : this.scope.containsElement(this.action.element))
        );
      }
      get controller() {
        return this.context.controller;
      }
      get methodName() {
        return this.action.methodName;
      }
      get element() {
        return this.scope.element;
      }
      get scope() {
        return this.context.scope;
      }
    },
    Be = class {
      constructor(e, t) {
        (this.mutationObserverInit = {
          attributes: !0,
          childList: !0,
          subtree: !0,
        }),
          (this.element = e),
          (this.started = !1),
          (this.delegate = t),
          (this.elements = new Set()),
          (this.mutationObserver = new MutationObserver((e) =>
            this.processMutations(e)
          ));
      }
      start() {
        this.started ||
          ((this.started = !0),
          this.mutationObserver.observe(
            this.element,
            this.mutationObserverInit
          ),
          this.refresh());
      }
      pause(e) {
        this.started &&
          (this.mutationObserver.disconnect(), (this.started = !1)),
          e(),
          this.started ||
            (this.mutationObserver.observe(
              this.element,
              this.mutationObserverInit
            ),
            (this.started = !0));
      }
      stop() {
        this.started &&
          (this.mutationObserver.takeRecords(),
          this.mutationObserver.disconnect(),
          (this.started = !1));
      }
      refresh() {
        if (this.started) {
          const e = new Set(this.matchElementsInTree());
          for (const t of Array.from(this.elements))
            e.has(t) || this.removeElement(t);
          for (const t of Array.from(e)) this.addElement(t);
        }
      }
      processMutations(e) {
        if (this.started) for (const t of e) this.processMutation(t);
      }
      processMutation(e) {
        "attributes" == e.type
          ? this.processAttributeChange(e.target, e.attributeName)
          : "childList" == e.type &&
            (this.processRemovedNodes(e.removedNodes),
            this.processAddedNodes(e.addedNodes));
      }
      processAttributeChange(e, t) {
        const n = e;
        this.elements.has(n)
          ? this.delegate.elementAttributeChanged && this.matchElement(n)
            ? this.delegate.elementAttributeChanged(n, t)
            : this.removeElement(n)
          : this.matchElement(n) && this.addElement(n);
      }
      processRemovedNodes(e) {
        for (const t of Array.from(e)) {
          const e = this.elementFromNode(t);
          e && this.processTree(e, this.removeElement);
        }
      }
      processAddedNodes(e) {
        for (const t of Array.from(e)) {
          const e = this.elementFromNode(t);
          e && this.elementIsActive(e) && this.processTree(e, this.addElement);
        }
      }
      matchElement(e) {
        return this.delegate.matchElement(e);
      }
      matchElementsInTree(e = this.element) {
        return this.delegate.matchElementsInTree(e);
      }
      processTree(e, t) {
        for (const n of this.matchElementsInTree(e)) t.call(this, n);
      }
      elementFromNode(e) {
        if (e.nodeType == Node.ELEMENT_NODE) return e;
      }
      elementIsActive(e) {
        return (
          e.isConnected == this.element.isConnected && this.element.contains(e)
        );
      }
      addElement(e) {
        this.elements.has(e) ||
          (this.elementIsActive(e) &&
            (this.elements.add(e),
            this.delegate.elementMatched && this.delegate.elementMatched(e)));
      }
      removeElement(e) {
        this.elements.has(e) &&
          (this.elements.delete(e),
          this.delegate.elementUnmatched && this.delegate.elementUnmatched(e));
      }
    },
    $e = class {
      constructor(e, t, n) {
        (this.attributeName = t),
          (this.delegate = n),
          (this.elementObserver = new Be(e, this));
      }
      get element() {
        return this.elementObserver.element;
      }
      get selector() {
        return `[${this.attributeName}]`;
      }
      start() {
        this.elementObserver.start();
      }
      pause(e) {
        this.elementObserver.pause(e);
      }
      stop() {
        this.elementObserver.stop();
      }
      refresh() {
        this.elementObserver.refresh();
      }
      get started() {
        return this.elementObserver.started;
      }
      matchElement(e) {
        return e.hasAttribute(this.attributeName);
      }
      matchElementsInTree(e) {
        const t = this.matchElement(e) ? [e] : [],
          n = Array.from(e.querySelectorAll(this.selector));
        return t.concat(n);
      }
      elementMatched(e) {
        this.delegate.elementMatchedAttribute &&
          this.delegate.elementMatchedAttribute(e, this.attributeName);
      }
      elementUnmatched(e) {
        this.delegate.elementUnmatchedAttribute &&
          this.delegate.elementUnmatchedAttribute(e, this.attributeName);
      }
      elementAttributeChanged(e, t) {
        this.delegate.elementAttributeValueChanged &&
          this.attributeName == t &&
          this.delegate.elementAttributeValueChanged(e, t);
      }
    },
    He = class {
      constructor(e, t) {
        (this.element = e),
          (this.delegate = t),
          (this.started = !1),
          (this.stringMap = new Map()),
          (this.mutationObserver = new MutationObserver((e) =>
            this.processMutations(e)
          ));
      }
      start() {
        this.started ||
          ((this.started = !0),
          this.mutationObserver.observe(this.element, {
            attributes: !0,
            attributeOldValue: !0,
          }),
          this.refresh());
      }
      stop() {
        this.started &&
          (this.mutationObserver.takeRecords(),
          this.mutationObserver.disconnect(),
          (this.started = !1));
      }
      refresh() {
        if (this.started)
          for (const e of this.knownAttributeNames)
            this.refreshAttribute(e, null);
      }
      processMutations(e) {
        if (this.started) for (const t of e) this.processMutation(t);
      }
      processMutation(e) {
        const t = e.attributeName;
        t && this.refreshAttribute(t, e.oldValue);
      }
      refreshAttribute(e, t) {
        const n = this.delegate.getStringMapKeyForAttribute(e);
        if (null != n) {
          this.stringMap.has(e) || this.stringMapKeyAdded(n, e);
          const i = this.element.getAttribute(e);
          if (
            (this.stringMap.get(e) != i && this.stringMapValueChanged(i, n, t),
            null == i)
          ) {
            const t = this.stringMap.get(e);
            this.stringMap.delete(e), t && this.stringMapKeyRemoved(n, e, t);
          } else this.stringMap.set(e, i);
        }
      }
      stringMapKeyAdded(e, t) {
        this.delegate.stringMapKeyAdded &&
          this.delegate.stringMapKeyAdded(e, t);
      }
      stringMapValueChanged(e, t, n) {
        this.delegate.stringMapValueChanged &&
          this.delegate.stringMapValueChanged(e, t, n);
      }
      stringMapKeyRemoved(e, t, n) {
        this.delegate.stringMapKeyRemoved &&
          this.delegate.stringMapKeyRemoved(e, t, n);
      }
      get knownAttributeNames() {
        return Array.from(
          new Set(
            this.currentAttributeNames.concat(this.recordedAttributeNames)
          )
        );
      }
      get currentAttributeNames() {
        return Array.from(this.element.attributes).map((e) => e.name);
      }
      get recordedAttributeNames() {
        return Array.from(this.stringMap.keys());
      }
    },
    We = class {
      constructor() {
        this.valuesByKey = new Map();
      }
      get keys() {
        return Array.from(this.valuesByKey.keys());
      }
      get values() {
        return Array.from(this.valuesByKey.values()).reduce(
          (e, t) => e.concat(Array.from(t)),
          []
        );
      }
      get size() {
        return Array.from(this.valuesByKey.values()).reduce(
          (e, t) => e + t.size,
          0
        );
      }
      add(e, t) {
        f(this.valuesByKey, e, t);
      }
      delete(e, t) {
        h(this.valuesByKey, e, t);
      }
      has(e, t) {
        const n = this.valuesByKey.get(e);
        return null != n && n.has(t);
      }
      hasKey(e) {
        return this.valuesByKey.has(e);
      }
      hasValue(e) {
        return Array.from(this.valuesByKey.values()).some((t) => t.has(e));
      }
      getValuesForKey(e) {
        const t = this.valuesByKey.get(e);
        return t ? Array.from(t) : [];
      }
      getKeysForValue(e) {
        return Array.from(this.valuesByKey)
          .filter(([t, n]) => n.has(e))
          .map(([e, t]) => e);
      }
    },
    Ve = class {
      constructor(e, t, n) {
        (this.attributeObserver = new $e(e, t, this)),
          (this.delegate = n),
          (this.tokensByElement = new We());
      }
      get started() {
        return this.attributeObserver.started;
      }
      start() {
        this.attributeObserver.start();
      }
      pause(e) {
        this.attributeObserver.pause(e);
      }
      stop() {
        this.attributeObserver.stop();
      }
      refresh() {
        this.attributeObserver.refresh();
      }
      get element() {
        return this.attributeObserver.element;
      }
      get attributeName() {
        return this.attributeObserver.attributeName;
      }
      elementMatchedAttribute(e) {
        this.tokensMatched(this.readTokensForElement(e));
      }
      elementAttributeValueChanged(e) {
        const [t, n] = this.refreshTokensForElement(e);
        this.tokensUnmatched(t), this.tokensMatched(n);
      }
      elementUnmatchedAttribute(e) {
        this.tokensUnmatched(this.tokensByElement.getValuesForKey(e));
      }
      tokensMatched(e) {
        e.forEach((e) => this.tokenMatched(e));
      }
      tokensUnmatched(e) {
        e.forEach((e) => this.tokenUnmatched(e));
      }
      tokenMatched(e) {
        this.delegate.tokenMatched(e), this.tokensByElement.add(e.element, e);
      }
      tokenUnmatched(e) {
        this.delegate.tokenUnmatched(e),
          this.tokensByElement.delete(e.element, e);
      }
      refreshTokensForElement(e) {
        const t = this.tokensByElement.getValuesForKey(e),
          n = this.readTokensForElement(e),
          i = v(t, n).findIndex(([e, t]) => !y(e, t));
        return -1 == i ? [[], []] : [t.slice(i), n.slice(i)];
      }
      readTokensForElement(e) {
        const t = this.attributeName;
        return g(e.getAttribute(t) || "", e, t);
      }
    },
    Ue = class {
      constructor(e, t, n) {
        (this.tokenListObserver = new Ve(e, t, this)),
          (this.delegate = n),
          (this.parseResultsByToken = new WeakMap()),
          (this.valuesByTokenByElement = new WeakMap());
      }
      get started() {
        return this.tokenListObserver.started;
      }
      start() {
        this.tokenListObserver.start();
      }
      stop() {
        this.tokenListObserver.stop();
      }
      refresh() {
        this.tokenListObserver.refresh();
      }
      get element() {
        return this.tokenListObserver.element;
      }
      get attributeName() {
        return this.tokenListObserver.attributeName;
      }
      tokenMatched(e) {
        const { element: t } = e,
          { value: n } = this.fetchParseResultForToken(e);
        n &&
          (this.fetchValuesByTokenForElement(t).set(e, n),
          this.delegate.elementMatchedValue(t, n));
      }
      tokenUnmatched(e) {
        const { element: t } = e,
          { value: n } = this.fetchParseResultForToken(e);
        n &&
          (this.fetchValuesByTokenForElement(t).delete(e),
          this.delegate.elementUnmatchedValue(t, n));
      }
      fetchParseResultForToken(e) {
        let t = this.parseResultsByToken.get(e);
        return (
          t || ((t = this.parseToken(e)), this.parseResultsByToken.set(e, t)), t
        );
      }
      fetchValuesByTokenForElement(e) {
        let t = this.valuesByTokenByElement.get(e);
        return t || ((t = new Map()), this.valuesByTokenByElement.set(e, t)), t;
      }
      parseToken(e) {
        try {
          return { value: this.delegate.parseValueForToken(e) };
        } catch (e) {
          return { error: e };
        }
      }
    },
    ze = class {
      constructor(e, t) {
        (this.context = e),
          (this.delegate = t),
          (this.bindingsByAction = new Map());
      }
      start() {
        this.valueListObserver ||
          ((this.valueListObserver = new Ue(
            this.element,
            this.actionAttribute,
            this
          )),
          this.valueListObserver.start());
      }
      stop() {
        this.valueListObserver &&
          (this.valueListObserver.stop(),
          delete this.valueListObserver,
          this.disconnectAllActions());
      }
      get element() {
        return this.context.element;
      }
      get identifier() {
        return this.context.identifier;
      }
      get actionAttribute() {
        return this.schema.actionAttribute;
      }
      get schema() {
        return this.context.schema;
      }
      get bindings() {
        return Array.from(this.bindingsByAction.values());
      }
      connectAction(e) {
        const t = new Re(this.context, e);
        this.bindingsByAction.set(e, t), this.delegate.bindingConnected(t);
      }
      disconnectAction(e) {
        const t = this.bindingsByAction.get(e);
        t &&
          (this.bindingsByAction.delete(e),
          this.delegate.bindingDisconnected(t));
      }
      disconnectAllActions() {
        this.bindings.forEach((e) => this.delegate.bindingDisconnected(e)),
          this.bindingsByAction.clear();
      }
      parseValueForToken(e) {
        const t = qe.forToken(e);
        if (t.identifier == this.identifier) return t;
      }
      elementMatchedValue(e, t) {
        this.connectAction(t);
      }
      elementUnmatchedValue(e, t) {
        this.disconnectAction(t);
      }
    },
    Ke = class {
      constructor(e, t) {
        (this.context = e),
          (this.receiver = t),
          (this.stringMapObserver = new He(this.element, this)),
          (this.valueDescriptorMap = this.controller.valueDescriptorMap),
          this.invokeChangedCallbacksForDefaultValues();
      }
      start() {
        this.stringMapObserver.start();
      }
      stop() {
        this.stringMapObserver.stop();
      }
      get element() {
        return this.context.element;
      }
      get controller() {
        return this.context.controller;
      }
      getStringMapKeyForAttribute(e) {
        if (e in this.valueDescriptorMap)
          return this.valueDescriptorMap[e].name;
      }
      stringMapKeyAdded(e, t) {
        const n = this.valueDescriptorMap[t];
        this.hasValue(e) ||
          this.invokeChangedCallback(
            e,
            n.writer(this.receiver[e]),
            n.writer(n.defaultValue)
          );
      }
      stringMapValueChanged(e, t, n) {
        const i = this.valueDescriptorNameMap[t];
        null !== e &&
          (null === n && (n = i.writer(i.defaultValue)),
          this.invokeChangedCallback(t, e, n));
      }
      stringMapKeyRemoved(e, t, n) {
        const i = this.valueDescriptorNameMap[e];
        this.hasValue(e)
          ? this.invokeChangedCallback(e, i.writer(this.receiver[e]), n)
          : this.invokeChangedCallback(e, i.writer(i.defaultValue), n);
      }
      invokeChangedCallbacksForDefaultValues() {
        for (const { key: e, name: t, defaultValue: n, writer: i } of this
          .valueDescriptors)
          null == n ||
            this.controller.data.has(e) ||
            this.invokeChangedCallback(t, i(n), void 0);
      }
      invokeChangedCallback(e, t, n) {
        const i = `${e}Changed`,
          r = this.receiver[i];
        if ("function" == typeof r) {
          const i = this.valueDescriptorNameMap[e],
            o = i.reader(t);
          let s = n;
          n && (s = i.reader(n)), r.call(this.receiver, o, s);
        }
      }
      get valueDescriptors() {
        const { valueDescriptorMap: e } = this;
        return Object.keys(e).map((t) => e[t]);
      }
      get valueDescriptorNameMap() {
        const e = {};
        return (
          Object.keys(this.valueDescriptorMap).forEach((t) => {
            const n = this.valueDescriptorMap[t];
            e[n.name] = n;
          }),
          e
        );
      }
      hasValue(e) {
        const t = `has${s(this.valueDescriptorNameMap[e].name)}`;
        return this.receiver[t];
      }
    },
    Qe = class {
      constructor(e, t) {
        (this.context = e),
          (this.delegate = t),
          (this.targetsByName = new We());
      }
      start() {
        this.tokenListObserver ||
          ((this.tokenListObserver = new Ve(
            this.element,
            this.attributeName,
            this
          )),
          this.tokenListObserver.start());
      }
      stop() {
        this.tokenListObserver &&
          (this.disconnectAllTargets(),
          this.tokenListObserver.stop(),
          delete this.tokenListObserver);
      }
      tokenMatched({ element: e, content: t }) {
        this.scope.containsElement(e) && this.connectTarget(e, t);
      }
      tokenUnmatched({ element: e, content: t }) {
        this.disconnectTarget(e, t);
      }
      connectTarget(e, t) {
        var n;
        this.targetsByName.has(t, e) ||
          (this.targetsByName.add(t, e),
          null === (n = this.tokenListObserver) ||
            void 0 === n ||
            n.pause(() => this.delegate.targetConnected(e, t)));
      }
      disconnectTarget(e, t) {
        var n;
        this.targetsByName.has(t, e) &&
          (this.targetsByName.delete(t, e),
          null === (n = this.tokenListObserver) ||
            void 0 === n ||
            n.pause(() => this.delegate.targetDisconnected(e, t)));
      }
      disconnectAllTargets() {
        for (const e of this.targetsByName.keys)
          for (const t of this.targetsByName.getValuesForKey(e))
            this.disconnectTarget(t, e);
      }
      get attributeName() {
        return `data-${this.context.identifier}-target`;
      }
      get element() {
        return this.context.element;
      }
      get scope() {
        return this.context.scope;
      }
    },
    Xe = class {
      constructor(e, t) {
        (this.logDebugActivity = (e, t = {}) => {
          const { identifier: n, controller: i, element: r } = this;
          (t = Object.assign({ identifier: n, controller: i, element: r }, t)),
            this.application.logDebugActivity(this.identifier, e, t);
        }),
          (this.module = e),
          (this.scope = t),
          (this.controller = new e.controllerConstructor(this)),
          (this.bindingObserver = new ze(this, this.dispatcher)),
          (this.valueObserver = new Ke(this, this.controller)),
          (this.targetObserver = new Qe(this, this));
        try {
          this.controller.initialize(), this.logDebugActivity("initialize");
        } catch (e) {
          this.handleError(e, "initializing controller");
        }
      }
      connect() {
        this.bindingObserver.start(),
          this.valueObserver.start(),
          this.targetObserver.start();
        try {
          this.controller.connect(), this.logDebugActivity("connect");
        } catch (e) {
          this.handleError(e, "connecting controller");
        }
      }
      disconnect() {
        try {
          this.controller.disconnect(), this.logDebugActivity("disconnect");
        } catch (e) {
          this.handleError(e, "disconnecting controller");
        }
        this.targetObserver.stop(),
          this.valueObserver.stop(),
          this.bindingObserver.stop();
      }
      get application() {
        return this.module.application;
      }
      get identifier() {
        return this.module.identifier;
      }
      get schema() {
        return this.application.schema;
      }
      get dispatcher() {
        return this.application.dispatcher;
      }
      get element() {
        return this.scope.element;
      }
      get parentElement() {
        return this.element.parentElement;
      }
      handleError(e, t, n = {}) {
        const { identifier: i, controller: r, element: o } = this;
        (n = Object.assign({ identifier: i, controller: r, element: o }, n)),
          this.application.handleError(e, `Error ${t}`, n);
      }
      targetConnected(e, t) {
        this.invokeControllerMethod(`${t}TargetConnected`, e);
      }
      targetDisconnected(e, t) {
        this.invokeControllerMethod(`${t}TargetDisconnected`, e);
      }
      invokeControllerMethod(e, ...t) {
        const n = this.controller;
        "function" == typeof n[e] && n[e](...t);
      }
    },
    Ye =
      "function" == typeof Object.getOwnPropertySymbols
        ? (e) => [
            ...Object.getOwnPropertyNames(e),
            ...Object.getOwnPropertySymbols(e),
          ]
        : Object.getOwnPropertyNames,
    Ge = (() => {
      function e(e) {
        function t() {
          return Reflect.construct(e, arguments, new.target);
        }
        return (
          (t.prototype = Object.create(e.prototype, {
            constructor: { value: t },
          })),
          Reflect.setPrototypeOf(t, e),
          t
        );
      }
      function t() {
        const t = e(function () {
          this.a.call(this);
        });
        return (t.prototype.a = function () {}), new t();
      }
      try {
        return t(), e;
      } catch (e) {
        return (e) => class extends e {};
      }
    })(),
    Je = class {
      constructor(e, t) {
        (this.application = e),
          (this.definition = N(t)),
          (this.contextsByScope = new WeakMap()),
          (this.connectedContexts = new Set());
      }
      get identifier() {
        return this.definition.identifier;
      }
      get controllerConstructor() {
        return this.definition.controllerConstructor;
      }
      get contexts() {
        return Array.from(this.connectedContexts);
      }
      connectContextForScope(e) {
        const t = this.fetchContextForScope(e);
        this.connectedContexts.add(t), t.connect();
      }
      disconnectContextForScope(e) {
        const t = this.contextsByScope.get(e);
        t && (this.connectedContexts.delete(t), t.disconnect());
      }
      fetchContextForScope(e) {
        let t = this.contextsByScope.get(e);
        return t || ((t = new Xe(this, e)), this.contextsByScope.set(e, t)), t;
      }
    },
    Ze = class {
      constructor(e) {
        this.scope = e;
      }
      has(e) {
        return this.data.has(this.getDataKey(e));
      }
      get(e) {
        return this.getAll(e)[0];
      }
      getAll(e) {
        return l(this.data.get(this.getDataKey(e)) || "");
      }
      getAttributeName(e) {
        return this.data.getAttributeNameForKey(this.getDataKey(e));
      }
      getDataKey(e) {
        return `${e}-class`;
      }
      get data() {
        return this.scope.data;
      }
    },
    et = class {
      constructor(e) {
        this.scope = e;
      }
      get element() {
        return this.scope.element;
      }
      get identifier() {
        return this.scope.identifier;
      }
      get(e) {
        const t = this.getAttributeNameForKey(e);
        return this.element.getAttribute(t);
      }
      set(e, t) {
        const n = this.getAttributeNameForKey(e);
        return this.element.setAttribute(n, t), this.get(e);
      }
      has(e) {
        const t = this.getAttributeNameForKey(e);
        return this.element.hasAttribute(t);
      }
      delete(e) {
        if (this.has(e)) {
          const t = this.getAttributeNameForKey(e);
          return this.element.removeAttribute(t), !0;
        }
        return !1;
      }
      getAttributeNameForKey(e) {
        return `data-${this.identifier}-${a(e)}`;
      }
    },
    tt = class {
      constructor(e) {
        (this.warnedKeysByObject = new WeakMap()), (this.logger = e);
      }
      warn(e, t, n) {
        let i = this.warnedKeysByObject.get(e);
        i || ((i = new Set()), this.warnedKeysByObject.set(e, i)),
          i.has(t) || (i.add(t), this.logger.warn(n, e));
      }
    },
    nt = class {
      constructor(e) {
        this.scope = e;
      }
      get element() {
        return this.scope.element;
      }
      get identifier() {
        return this.scope.identifier;
      }
      get schema() {
        return this.scope.schema;
      }
      has(e) {
        return null != this.find(e);
      }
      find(...e) {
        return e.reduce(
          (e, t) => e || this.findTarget(t) || this.findLegacyTarget(t),
          void 0
        );
      }
      findAll(...e) {
        return e.reduce(
          (e, t) => [
            ...e,
            ...this.findAllTargets(t),
            ...this.findAllLegacyTargets(t),
          ],
          []
        );
      }
      findTarget(e) {
        const t = this.getSelectorForTargetName(e);
        return this.scope.findElement(t);
      }
      findAllTargets(e) {
        const t = this.getSelectorForTargetName(e);
        return this.scope.findAllElements(t);
      }
      getSelectorForTargetName(e) {
        return O(this.schema.targetAttributeForScope(this.identifier), e);
      }
      findLegacyTarget(e) {
        const t = this.getLegacySelectorForTargetName(e);
        return this.deprecate(this.scope.findElement(t), e);
      }
      findAllLegacyTargets(e) {
        const t = this.getLegacySelectorForTargetName(e);
        return this.scope.findAllElements(t).map((t) => this.deprecate(t, e));
      }
      getLegacySelectorForTargetName(e) {
        const t = `${this.identifier}.${e}`;
        return O(this.schema.targetAttribute, t);
      }
      deprecate(e, t) {
        if (e) {
          const { identifier: n } = this,
            i = this.schema.targetAttribute,
            r = this.schema.targetAttributeForScope(n);
          this.guide.warn(
            e,
            `target:${t}`,
            `Please replace ${i}="${n}.${t}" with ${r}="${t}". The ${i} attribute is deprecated and will be removed in a future version of Stimulus.`
          );
        }
        return e;
      }
      get guide() {
        return this.scope.guide;
      }
    },
    it = class {
      constructor(e, t, n, i) {
        (this.targets = new nt(this)),
          (this.classes = new Ze(this)),
          (this.data = new et(this)),
          (this.containsElement = (e) =>
            e.closest(this.controllerSelector) === this.element),
          (this.schema = e),
          (this.element = t),
          (this.identifier = n),
          (this.guide = new tt(i));
      }
      findElement(e) {
        return this.element.matches(e)
          ? this.element
          : this.queryElements(e).find(this.containsElement);
      }
      findAllElements(e) {
        return [
          ...(this.element.matches(e) ? [this.element] : []),
          ...this.queryElements(e).filter(this.containsElement),
        ];
      }
      queryElements(e) {
        return Array.from(this.element.querySelectorAll(e));
      }
      get controllerSelector() {
        return O(this.schema.controllerAttribute, this.identifier);
      }
    },
    rt = class {
      constructor(e, t, n) {
        (this.element = e),
          (this.schema = t),
          (this.delegate = n),
          (this.valueListObserver = new Ue(
            this.element,
            this.controllerAttribute,
            this
          )),
          (this.scopesByIdentifierByElement = new WeakMap()),
          (this.scopeReferenceCounts = new WeakMap());
      }
      start() {
        this.valueListObserver.start();
      }
      stop() {
        this.valueListObserver.stop();
      }
      get controllerAttribute() {
        return this.schema.controllerAttribute;
      }
      parseValueForToken(e) {
        const { element: t, content: n } = e,
          i = this.fetchScopesByIdentifierForElement(t);
        let r = i.get(n);
        return (
          r ||
            ((r = this.delegate.createScopeForElementAndIdentifier(t, n)),
            i.set(n, r)),
          r
        );
      }
      elementMatchedValue(e, t) {
        const n = (this.scopeReferenceCounts.get(t) || 0) + 1;
        this.scopeReferenceCounts.set(t, n),
          1 == n && this.delegate.scopeConnected(t);
      }
      elementUnmatchedValue(e, t) {
        const n = this.scopeReferenceCounts.get(t);
        n &&
          (this.scopeReferenceCounts.set(t, n - 1),
          1 == n && this.delegate.scopeDisconnected(t));
      }
      fetchScopesByIdentifierForElement(e) {
        let t = this.scopesByIdentifierByElement.get(e);
        return (
          t || ((t = new Map()), this.scopesByIdentifierByElement.set(e, t)), t
        );
      }
    },
    ot = class {
      constructor(e) {
        (this.application = e),
          (this.scopeObserver = new rt(this.element, this.schema, this)),
          (this.scopesByIdentifier = new We()),
          (this.modulesByIdentifier = new Map());
      }
      get element() {
        return this.application.element;
      }
      get schema() {
        return this.application.schema;
      }
      get logger() {
        return this.application.logger;
      }
      get controllerAttribute() {
        return this.schema.controllerAttribute;
      }
      get modules() {
        return Array.from(this.modulesByIdentifier.values());
      }
      get contexts() {
        return this.modules.reduce((e, t) => e.concat(t.contexts), []);
      }
      start() {
        this.scopeObserver.start();
      }
      stop() {
        this.scopeObserver.stop();
      }
      loadDefinition(e) {
        this.unloadIdentifier(e.identifier);
        const t = new Je(this.application, e);
        this.connectModule(t);
      }
      unloadIdentifier(e) {
        const t = this.modulesByIdentifier.get(e);
        t && this.disconnectModule(t);
      }
      getContextForElementAndIdentifier(e, t) {
        const n = this.modulesByIdentifier.get(t);
        if (n) return n.contexts.find((t) => t.element == e);
      }
      handleError(e, t, n) {
        this.application.handleError(e, t, n);
      }
      createScopeForElementAndIdentifier(e, t) {
        return new it(this.schema, e, t, this.logger);
      }
      scopeConnected(e) {
        this.scopesByIdentifier.add(e.identifier, e);
        const t = this.modulesByIdentifier.get(e.identifier);
        t && t.connectContextForScope(e);
      }
      scopeDisconnected(e) {
        this.scopesByIdentifier.delete(e.identifier, e);
        const t = this.modulesByIdentifier.get(e.identifier);
        t && t.disconnectContextForScope(e);
      }
      connectModule(e) {
        this.modulesByIdentifier.set(e.identifier, e);
        this.scopesByIdentifier
          .getValuesForKey(e.identifier)
          .forEach((t) => e.connectContextForScope(t));
      }
      disconnectModule(e) {
        this.modulesByIdentifier.delete(e.identifier);
        this.scopesByIdentifier
          .getValuesForKey(e.identifier)
          .forEach((t) => e.disconnectContextForScope(t));
      }
    },
    st = {
      controllerAttribute: "data-controller",
      actionAttribute: "data-action",
      targetAttribute: "data-target",
      targetAttributeForScope: (e) => `data-${e}-target`,
    },
    at = class {
      constructor(e = document.documentElement, t = st) {
        (this.logger = console),
          (this.debug = !1),
          (this.logDebugActivity = (e, t, n = {}) => {
            this.debug && this.logFormattedMessage(e, t, n);
          }),
          (this.element = e),
          (this.schema = t),
          (this.dispatcher = new Me(this)),
          (this.router = new ot(this));
      }
      static start(e, t) {
        const n = new at(e, t);
        return n.start(), n;
      }
      async start() {
        await D(),
          this.logDebugActivity("application", "starting"),
          this.dispatcher.start(),
          this.router.start(),
          this.logDebugActivity("application", "start");
      }
      stop() {
        this.logDebugActivity("application", "stopping"),
          this.dispatcher.stop(),
          this.router.stop(),
          this.logDebugActivity("application", "stop");
      }
      register(e, t) {
        t.shouldLoad && this.load({ identifier: e, controllerConstructor: t });
      }
      load(e, ...t) {
        (Array.isArray(e) ? e : [e, ...t]).forEach((e) =>
          this.router.loadDefinition(e)
        );
      }
      unload(e, ...t) {
        (Array.isArray(e) ? e : [e, ...t]).forEach((e) =>
          this.router.unloadIdentifier(e)
        );
      }
      get controllers() {
        return this.router.contexts.map((e) => e.controller);
      }
      getControllerForElementAndIdentifier(e, t) {
        const n = this.router.getContextForElementAndIdentifier(e, t);
        return n ? n.controller : null;
      }
      handleError(e, t, n) {
        var i;
        this.logger.error("%s\n\n%o\n\n%o", t, e, n),
          null === (i = window.onerror) ||
            void 0 === i ||
            i.call(window, t, "", 0, 0, e);
      }
      logFormattedMessage(e, t, n = {}) {
        (n = Object.assign({ application: this }, n)),
          this.logger.groupCollapsed(`${e} #${t}`),
          this.logger.log("details:", Object.assign({}, n)),
          this.logger.groupEnd();
      }
    },
    lt = {
      get array() {
        return [];
      },
      boolean: !1,
      number: 0,
      get object() {
        return {};
      },
      string: "",
    },
    ut = {
      array(e) {
        const t = JSON.parse(e);
        if (!Array.isArray(t)) throw new TypeError("Expected array");
        return t;
      },
      boolean: (e) => !("0" == e || "false" == e),
      number: (e) => Number(e),
      object(e) {
        const t = JSON.parse(e);
        if (null === t || "object" != typeof t || Array.isArray(t))
          throw new TypeError("Expected object");
        return t;
      },
      string: (e) => e,
    },
    ct = { default: K, array: z, object: z },
    dt = class {
      constructor(e) {
        this.context = e;
      }
      static get shouldLoad() {
        return !0;
      }
      get application() {
        return this.context.application;
      }
      get scope() {
        return this.context.scope;
      }
      get element() {
        return this.scope.element;
      }
      get identifier() {
        return this.scope.identifier;
      }
      get targets() {
        return this.scope.targets;
      }
      get classes() {
        return this.scope.classes;
      }
      get data() {
        return this.scope.data;
      }
      initialize() {}
      connect() {}
      disconnect() {}
      dispatch(
        e,
        {
          target: t = this.element,
          detail: n = {},
          prefix: i = this.identifier,
          bubbles: r = !0,
          cancelable: o = !0,
        } = {}
      ) {
        const s = new CustomEvent(i ? `${i}:${e}` : e, {
          detail: n,
          bubbles: r,
          cancelable: o,
        });
        return t.dispatchEvent(s), s;
      }
    };
  (dt.blessings = [j, I, F]), (dt.targets = []), (dt.values = {});
  var ft = at.start();
  (ft.debug = !1), (window.Stimulus = ft);
  var ht = class extends dt {
    connect() {
      this.element.textContent = "Hello World!";
    }
  };
  ft.register("hello", ht);
  var pt = Ne(Oe());
  (window.$ = pt.default), (window.jQuery = pt.default);
  Ne(Le());
  $(function () {
    Q(),
      $("form.contact-form").submit((e) => {
        e.preventDefault();
        const t = $(e.target);
        t.valid()
          ? (t.trigger("onValid"),
            $.ajax({
              type: "POST",
              data: t.serialize(),
              url: "/contacts",
              success: (e) => {
                t.trigger("onSuccess", [e]),
                  (window.location = t.attr("target"));
              },
              error: (e) => {
                t.trigger("onError", [e]), alert("Error, please try again!");
              },
            }))
          : t.trigger("onInvalid");
      });
  }),
    $(function () {
      $("form.order-form").submit(ye), $("form.product-form").submit(be);
    }),
    $(function () {
      $("form.search .submit").click(() => {
        $("form.search").submit();
      });
    }),
    $(function () {
      $("form.wk-comment-form").validate({
        rules: {
          content: { required: !0 },
          name: { required: !0 },
          phone: { required: !0, phoneNumber: !0 },
        },
        messages: {
          content: "Vui l\xf2ng nh\u1eadp c\u1ea3m nh\u1eadn c\u1ee7a b\u1ea1n",
          name: "Vui l\xf2ng nh\u1eadp t\xean",
          phone: {
            required: "Vui l\xf2ng nh\u1eadp s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
            phoneNumber:
              "Vui l\xf2ng nh\u1eadp \u0111\xfang s\u1ed1 \u0111i\u1ec7n tho\u1ea1i",
          },
        },
        submitHandler: function (e, t) {
          t.preventDefault(),
            $(e).find($('button[type="submit"]')).attr("disabled", !0);
          const n = $(e).attr("action");
          (data = $(e).serializeArray()),
            $.ajax({
              url: n,
              type: "POST",
              data: data,
              success: function (t) {
                t.success
                  ? (html =
                      "<div class='alert alert-success' role='alert'>\n              <h4 class='alert-heading text-center'>C\u1ea3m \u01a1n b\u1ea1n \u0111\xe3 g\u1eedi c\u1ea3m nh\u1eadn</h4>\n              <p>H\u1ec7 th\u1ed1ng s\u1ebd ki\u1ec3m duy\u1ec7t \u0111\xe1nh gi\xe1 c\u1ee7a b\u1ea1n v\xe0 \u0111\u0103ng l\xean sau 24h n\u1ebfu ph\xf9 h\u1ee3p</p>\n            </div>")
                  : (html =
                      "<div class='alert alert-danger' role='alert'>\n              <h4 class='alert-heading'>C\u1ea3m \u01a1n b\u1ea1n \u0111\xe3 g\u1eedi c\u1ea3m nh\u1eadn</h4>\n              <p>\u0110\xe1nh gi\xe1 c\u1ee7a b\u1ea1n ch\u01b0a \u0111\u01b0\u1ee3c g\u1eedi th\xe0nh c\xf4ng. Vui l\xf2ng th\u1eed l\u1ea1i sau</p>\n            </div>"),
                  $("#comment-message-modal").length > 0 &&
                    ($("#comment-message-modal")
                      .find(".comment-result-message")
                      .html(html),
                    $("#comment-message-modal").modal("show")),
                  $(e)
                    .closest(".wk-comments-container")
                    .find(".wk-comments-body")
                    .prepend(decodeURI(t.comment_html));
              },
              error: function () {
                alert(
                  "H\u1ec7 th\u1ed1ng \u0111ang b\u1eadn, vui l\xf2ng th\u1eed l\u1ea1i sau"
                );
              },
            });
        },
      });
    }),
    $(document).ready(function () {
      $(".wk-comments-container").each((e, t) => _e(t, 1)),
        $(document).on(
          "click",
          ".wk-comments-container .load-more-comments",
          function () {
            const e = $(this).attr("data-page");
            _e($(this).closest(".wk-comments-container"), e);
          }
        );
    });
})();
