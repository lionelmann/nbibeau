(window.webpackJsonp=window.webpackJsonp||[]).push([[3],{239:function(t,e,n){var content=n(244);content.__esModule&&(content=content.default),"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,n(40).default)("e8c24ec8",content,!0,{sourceMap:!1})},243:function(t,e,n){"use strict";n(239)},244:function(t,e,n){var o=n(39)(!1);o.push([t.i,'.meta[data-v-272023a2]{font-weight:100;font-size:.9rem}.meta[data-v-272023a2],a[data-v-272023a2]{font-family:"Lato",sans-serif}a[data-v-272023a2]{text-decoration:none;color:#735c4f}a[data-v-272023a2]:hover{border-bottom:1px solid #735c4f}.masonry[data-v-272023a2]{transition:all .5s ease-in-out;grid-column-gap:30px;-moz-column-gap:30px;column-gap:30px;-moz-column-fill:balance;column-fill:balance;-moz-column-fill:initial;column-fill:initial;padding:30px}.masonry .brick[data-v-272023a2]{margin-bottom:30px;display:inline-block;vertical-align:top}.masonry .brick img[data-v-272023a2]{transition:all .5s ease-in-out;-webkit-backface-visibility:hidden;backface-visibility:hidden;margin-bottom:10px}.masonry .brick:hover img[data-v-272023a2]{opacity:.75}.masonry.bordered[data-v-272023a2]{-moz-column-rule:1px solid #eee;column-rule:1px solid #eee;grid-column-gap:50px;-moz-column-gap:50px;column-gap:50px}.masonry.bordered .brick[data-v-272023a2]{padding-bottom:25px;margin-bottom:25px;border-bottom:1px solid #eee}.masonry.gutterless[data-v-272023a2]{grid-column-gap:0;-moz-column-gap:0;column-gap:0}.masonry.gutterless .brick[data-v-272023a2]{margin-bottom:0}@media only screen and (min-width:768px) and (max-width:1023px){.masonry[data-v-272023a2]{-moz-column-count:2;column-count:2}}@media only screen and (min-width:1024px){.desc[data-v-272023a2]{font-size:1.25em}.intro[data-v-272023a2]{letter-spacing:1px}.masonry[data-v-272023a2]{-moz-column-count:3;column-count:3}}',""]),t.exports=o},257:function(t,e,n){"use strict";n.r(e);var o=n(2),r=(n(38),{data:function(){return{films:[]}},fetch:function(){var t=this;return Object(o.a)(regeneratorRuntime.mark((function e(){return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,t.$content("films").sortBy("year","desc").fetch();case 2:t.films=e.sent;case 3:case"end":return e.stop()}}),e)})))()}}),c=(n(243),n(19)),component=Object(c.a)(r,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"masonry bordered"},t._l(t.films,(function(e,o){return n("div",{key:o,staticClass:"brick"},[n("img",{attrs:{src:"/cover/"+e.image}}),t._v(" "),n("h2",[t._v(t._s(e.title)+" / "+t._s(e.year))]),t._v(" "),n("br"),t._v(" "),n("div",{staticClass:"meta"},[t._v(t._s(e.category))]),t._v(" "),n("div",{staticClass:"meta"},[t._v(t._s(e.roles))]),t._v(" "),n("div",{staticClass:"meta"},[t._v(t._s(e.length))]),t._v(" "),n("div",{staticClass:"meta"},[t._v(t._s(e.broadcaster))]),t._v(" "),n("br"),t._v(" "),n("nuxt-content",{attrs:{document:e}}),t._v(" "),n("br"),t._v(" "),n("a",{attrs:{href:e.website,target:"_blank"}},[t._v("View")])],1)})),0)}),[],!1,null,"272023a2",null);e.default=component.exports}}]);