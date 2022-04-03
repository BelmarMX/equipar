(()=>{var e={318:()=>{!function(e){"use strict";var t=function(t,n){var i=this,a=e.extend({},n),s=e.extend(!0,{},{allowFreeEntries:!0,allowDuplicates:!1,ajaxConfig:{},autoSelect:!0,selectFirst:!1,queryParam:"query",beforeSend:function(){},cls:"",data:null,dataUrlParams:{},disabled:!1,disabledField:null,displayField:"name",editable:!0,expanded:!1,expandOnFocus:!1,groupBy:null,hideTrigger:!1,highlight:!0,id:null,infoMsgCls:"",inputCfg:{},invalidCls:"ms-inv",matchCase:!1,maxDropHeight:290,maxEntryLength:null,maxEntryRenderer:function(e){return"Please reduce your entry by "+e+" character"+(e>1?"s":"")},maxSuggestions:null,maxSelection:10,maxSelectionRenderer:function(e){return"You cannot choose more than "+e+" item"+(e>1?"s":"")},method:"POST",minChars:0,minCharsRenderer:function(e){return"Please type "+e+" more character"+(e>1?"s":"")},mode:"local",name:null,noSuggestionText:"No suggestions",placeholder:"Type or click here",renderer:null,required:!1,resultAsString:!1,resultAsStringDelimiter:",",resultsField:"results",selectionCls:"",selectionContainer:null,selectionPosition:"inner",selectionRenderer:null,selectionStacked:!1,sortDir:"asc",sortOrder:null,strictSuggest:!1,style:"",toggleOnClick:!1,typeDelay:400,useTabKey:!1,useCommaKey:!0,useZebraStyle:!1,value:null,valueField:"id",vregex:null,vtype:null},a);this.addToSelection=function(t,n){if(!s.maxSelection||r.length<s.maxSelection){e.isArray(t)||(t=[t]);var a=!1;e.each(t,(function(t,n){(s.allowDuplicates||-1===e.inArray(n[s.valueField],i.getValue()))&&(r.push(n),a=!0)})),!0===a&&(g._renderSelection(),this.empty(),!0!==n&&e(this).trigger("selectionchange",[this,this.getSelection()]))}this.input.attr("placeholder","inner"===s.selectionPosition&&this.getValue().length>0?"":s.placeholder)},this.clear=function(e){this.removeFromSelection(r.slice(0),e)},this.collapse=function(){!0===s.expanded&&(this.combobox.detach(),s.expanded=!1,e(this).trigger("collapse",[this]))},this.disable=function(){this.container.addClass("ms-ctn-disabled"),s.disabled=!0,i.input.attr("disabled",!0)},this.empty=function(){this.input.val("")},this.enable=function(){this.container.removeClass("ms-ctn-disabled"),s.disabled=!1,i.input.attr("disabled",!1)},this.expand=function(){!s.expanded&&(this.input.val().length>=s.minChars||this.combobox.children().length>0)&&(this.combobox.appendTo(this.container),g._processSuggestions(),s.expanded=!0,e(this).trigger("expand",[this]))},this.isDisabled=function(){return s.disabled},this.isValid=function(){var t=!1===s.required||r.length>0;return(s.vtype||s.vregex)&&e.each(r,(function(e,n){t=t&&g._validateSingleItem(n[s.valueField])})),t},this.getDataUrlParams=function(){return s.dataUrlParams},this.getName=function(){return s.name},this.getSelection=function(){return r},this.getRawValue=function(){return this.stripHtml(i.input.val())},this.stripHtml=function(e){return e.replace(/(<([^>]+)>)/gi,"")},this.getValue=function(){return e.map(r,(function(e){return e[s.valueField]}))},this.removeFromSelection=function(t,n){e.isArray(t)||(t=[t]);var a=!1;e.each(t,(function(t,n){var o=e.inArray(n[s.valueField],i.getValue());o>-1&&(r.splice(o,1),a=!0)})),!0===a&&(g._renderSelection(),!0!==n&&e(this).trigger("selectionchange",[this,this.getSelection()]),s.expandOnFocus&&i.expand(),s.expanded&&g._processSuggestions()),this.input.attr("placeholder","inner"===s.selectionPosition&&this.getValue().length>0?"":s.placeholder)},this.getData=function(){return u},this.setData=function(e){s.data=e,g._processSuggestions()},this.setName=function(t){s.name=t,t&&(s.name+=t.indexOf("[]")>0?"":"[]"),i._valueContainer&&e.each(i._valueContainer.children(),(function(e,t){t.name=s.name}))},this.setSelection=function(e){this.clear(),this.addToSelection(e)},this.setValue=function(t){var n=[];e.each(t,(function(t,i){var a=!1;if(e.each(u,(function(e,t){if(t[s.valueField]==i)return n.push(t),a=!0,!1})),!a)if("object"==typeof i)n.push(i);else{var o={};o[s.valueField]=i,o[s.displayField]=i,n.push(o)}})),n.length>0&&this.addToSelection(n)},this.setDataUrlParams=function(t){s.dataUrlParams=e.extend({},t)},this.setMaxSelection=function(e){e<0&&(e=null),null!==e&&r.length>e&&this.removeFromSelection(r.slice(e)),s.maxSelection=e};var o,r=[],l=0,c=!1,d=null,u=[],m=!1,g={_displaySuggestions:function(t){i.combobox.show(),i.combobox.empty();var n=0,a=0;if(null===d)g._renderComboItems(t),n=l*t.length;else{for(var o in d)a+=1,e("<div/>",{class:"ms-res-group",html:o}).appendTo(i.combobox),g._renderComboItems(d[o].items,!0);var r=i.combobox.find(".ms-res-group").outerHeight();if(null!==r){var c=a*r;n=l*t.length+c}else n=l*(t.length+a)}if(n<i.combobox.height()||n<=s.maxDropHeight?i.combobox.height(n):n>=i.combobox.height()&&n>s.maxDropHeight&&i.combobox.height(s.maxDropHeight),1===t.length&&!0===s.autoSelect&&i.combobox.children().filter(":not(.ms-res-item-disabled):last").addClass("ms-res-item-active"),!0===s.selectFirst&&i.combobox.children().filter(":not(.ms-res-item-disabled):first").addClass("ms-res-item-active"),0===t.length&&""!==i.getRawValue()){var u=s.noSuggestionText.replace(/\{\{.*\}\}/,i.input.val());g._updateHelper(u),i.collapse()}!1===s.allowFreeEntries&&(0===t.length?(e(i.input).addClass(s.invalidCls),i.combobox.hide()):e(i.input).removeClass(s.invalidCls))},_getEntriesFromStringArray:function(t){var n=[];return e.each(t,(function(t,i){var a={};a[s.displayField]=a[s.valueField]=e.trim(i),n.push(a)})),n},_highlightSuggestion:function(t){var n=i.input.val();if(e.each(["^","$","*","+","?",".","(",")",":","!","|","{","}","[","]"],(function(e,t){n=n.replace(t,"\\"+t)})),0===n.length)return t;var a=!0===s.matchCase?"g":"gi";return t.replace(new RegExp("("+n+")(?!([^<]+)?>)",a),"<em>$1</em>")},_moveSelectedRow:function(e){var t,n,a,o;s.expanded||i.expand(),t=i.combobox.find(".ms-res-item:not(.ms-res-item-disabled)"),n="down"===e?t.eq(0):t.filter(":last"),(a=i.combobox.find(".ms-res-item-active:not(.ms-res-item-disabled):first")).length>0&&("down"===e?(0===(n=a.nextAll(".ms-res-item:not(.ms-res-item-disabled)").first()).length&&(n=t.eq(0)),o=i.combobox.scrollTop(),i.combobox.scrollTop(0),n[0].offsetTop+n.outerHeight()>i.combobox.height()&&i.combobox.scrollTop(o+l)):(0===(n=a.prevAll(".ms-res-item:not(.ms-res-item-disabled)").first()).length&&(n=t.filter(":last"),i.combobox.scrollTop(l*t.length)),n[0].offsetTop<i.combobox.scrollTop()&&i.combobox.scrollTop(i.combobox.scrollTop()-l))),t.removeClass("ms-res-item-active"),n.addClass("ms-res-item-active")},_processSuggestions:function(t){var n=null,a=t||s.data;if(null!==a){if("function"==typeof a&&(a=a.call(i,i.getRawValue())),"string"==typeof a){e(i).trigger("beforeload",[i]);var o={};o[s.queryParam]=i.input.val();var r=e.extend(o,s.dataUrlParams);return void e.ajax(e.extend({type:s.method,url:a,data:r,beforeSend:s.beforeSend,success:function(t){n="string"==typeof t?JSON.parse(t):t,g._processSuggestions(n),e(i).trigger("load",[i,n]),g._asyncValues&&(i.setValue("string"==typeof g._asyncValues?JSON.parse(g._asyncValues):g._asyncValues),g._renderSelection(),delete g._asyncValues)},error:function(t,n,a){e(i).trigger("error",[i,t,n,a])}},s.ajaxConfig))}u=a.length>0&&"string"==typeof a[0]?g._getEntriesFromStringArray(a):a[s.resultsField]||a;var l="remote"===s.mode?u:g._sortAndTrim(u);g._displaySuggestions(g._group(l))}},_render:function(t){if(i.setName(s.name),i.container=e("<div/>",{class:"ms-ctn form-control "+(s.resultAsString?"ms-as-string ":"")+s.cls+(e(t).hasClass("input-lg")?" input-lg":"")+(e(t).hasClass("input-sm")?" input-sm":"")+(!0===s.disabled?" ms-ctn-disabled":"")+(!0===s.editable?"":" ms-ctn-readonly")+(!1===s.hideTrigger?"":" ms-no-trigger"),style:s.style,id:s.id}),i.container.on("focus",e.proxy(p._onFocus,this)),i.container.on("blur",e.proxy(p._onBlur,this)),i.container.on("keydown",e.proxy(p._onKeyDown,this)),i.container.on("keyup",e.proxy(p._onKeyUp,this)),i.input=e("<input/>",e.extend({type:"text",class:!0===s.editable?"":" ms-input-readonly",readonly:!s.editable,placeholder:s.placeholder,disabled:s.disabled},s.inputCfg)),i.input.on("focus",e.proxy(p._onInputFocus,this)),i.input.on("click",e.proxy(p._onInputClick,this)),i.combobox=e("<div/>",{class:"ms-res-ctn dropdown-menu"}).height(s.maxDropHeight),i.combobox.on("click","div.ms-res-item",e.proxy(p._onComboItemSelected,this)),i.combobox.on("mouseover","div.ms-res-item",e.proxy(p._onComboItemMouseOver,this)),s.selectionContainer?(i.selectionContainer=s.selectionContainer,e(i.selectionContainer).addClass("ms-sel-ctn")):i.selectionContainer=e("<div/>",{class:"ms-sel-ctn"}),i.selectionContainer.on("click",e.proxy(p._onFocus,this)),"inner"!==s.selectionPosition||s.selectionContainer?i.container.append(i.input):i.selectionContainer.append(i.input),i.helper=e("<span/>",{class:"ms-helper "+s.infoMsgCls}),g._updateHelper(),i.container.append(i.helper),e(t).replaceWith(i.container),!s.selectionContainer)switch(s.selectionPosition){case"bottom":i.selectionContainer.insertAfter(i.container),!0===s.selectionStacked&&(i.selectionContainer.width(i.container.width()),i.selectionContainer.addClass("ms-stacked"));break;case"right":i.selectionContainer.insertAfter(i.container),i.container.css("float","left");break;default:i.container.append(i.selectionContainer)}!1===s.hideTrigger&&(i.trigger=e("<div/>",{class:"ms-trigger",html:'<div class="ms-trigger-ico"></div>'}),i.trigger.on("click",e.proxy(p._onTriggerClick,this)),i.container.append(i.trigger)),e(window).on("resize",e.proxy(p._onWindowResized,this)),null===s.value&&null===s.data||("string"==typeof s.data?(g._asyncValues=s.value,g._processSuggestions()):(g._processSuggestions(),null!==s.value&&(i.setValue(s.value),g._renderSelection()))),e("body").on("click",(function(e){i.container.hasClass("ms-ctn-focus")&&0===i.container.has(e.target).length&&e.target.className.indexOf("ms-res-item")<0&&e.target.className.indexOf("ms-close-btn")<0&&i.container[0]!==e.target&&p._onBlur()})),!0===s.expanded&&(s.expanded=!1,i.expand())},_renderComboItems:function(t,n){var a=this,o="";e.each(t,(function(t,i){var r=null!==s.renderer?s.renderer.call(a,i):i[s.displayField],l=null!==s.disabledField&&!0===i[s.disabledField],c=e("<div/>",{class:"ms-res-item "+(n?"ms-res-item-grouped ":"")+(l?"ms-res-item-disabled ":"")+(t%2==1&&!0===s.useZebraStyle?"ms-res-odd":""),html:!0===s.highlight?g._highlightSuggestion(r):r,"data-json":JSON.stringify(i)});o+=e("<div/>").append(c).html()})),i.combobox.append(o),l=i.combobox.find(".ms-res-item:first").outerHeight()},_renderSelection:function(){var t=this,n=0,a=0,o=[],l=!0===s.resultAsString&&!c;i.selectionContainer.find(".ms-sel-item").remove(),void 0!==i._valueContainer&&i._valueContainer.remove(),e.each(r,(function(n,i){var a,c=null!==s.selectionRenderer?s.selectionRenderer.call(t,i):i[s.displayField],d=g._validateSingleItem(i[s.displayField])?"":" ms-sel-invalid";!0===l?a=e("<div/>",{class:"ms-sel-item ms-sel-text "+s.selectionCls+d,html:c+(n===r.length-1?"":s.resultAsStringDelimiter)}).data("json",i):(a=e("<div/>",{class:"ms-sel-item "+s.selectionCls+d,html:c}).data("json",i),!1===s.disabled&&e("<span/>",{class:"ms-close-btn"}).data("json",i).prependTo(a).on("click",e.proxy(p._onTagTriggerClick,t))),o.push(a)})),i.selectionContainer.prepend(o),i._valueContainer=e("<div/>",{style:"display: none;"}),e.each(i.getValue(),(function(t,n){e("<input/>",{type:"hidden",name:s.name,value:n}).appendTo(i._valueContainer)})),i._valueContainer.appendTo(i.selectionContainer),"inner"!==s.selectionPosition||s.selectionContainer||(i.input.width(0),a=i.input.offset().left-i.selectionContainer.offset().left,n=i.container.width()-a-42,i.input.width(n)),r.length===s.maxSelection?g._updateHelper(s.maxSelectionRenderer.call(this,r.length)):i.helper.hide()},_selectItem:function(e){1===s.maxSelection&&(r=[]),i.addToSelection(e.data("json")),e.removeClass("ms-res-item-active"),!1!==s.expandOnFocus&&r.length!==s.maxSelection||i.collapse(),c?c&&(s.expandOnFocus||m)&&(g._processSuggestions(),m&&i.expand()):i.input.trigger("focus")},_sortAndTrim:function(t){var n=i.getRawValue(),a=[],o=[],r=i.getValue();return n.length>0?e.each(t,(function(e,t){var i=t[s.displayField];(!0===s.matchCase&&i.indexOf(n)>-1||!1===s.matchCase&&i.toLowerCase().indexOf(n.toLowerCase())>-1)&&(!1!==s.strictSuggest&&0!==i.toLowerCase().indexOf(n.toLowerCase())||a.push(t))})):a=t,e.each(a,(function(t,n){(s.allowDuplicates||-1===e.inArray(n[s.valueField],r))&&o.push(n)})),null!==s.sortOrder&&o.sort((function(e,t){return e[s.sortOrder]<t[s.sortOrder]?"asc"===s.sortDir?-1:1:e[s.sortOrder]>t[s.sortOrder]?"asc"===s.sortDir?1:-1:0})),s.maxSuggestions&&s.maxSuggestions>0&&(o=o.slice(0,s.maxSuggestions)),o},_group:function(t){return null!==s.groupBy&&(d={},e.each(t,(function(e,t){var n=s.groupBy.indexOf(".")>-1?s.groupBy.split("."):s.groupBy,i=t[s.groupBy];if("string"!=typeof n)for(i=t;n.length>0;)i=i[n.shift()];void 0===d[i]?d[i]={title:i,items:[t]}:d[i].items.push(t)}))),t},_updateHelper:function(e){i.helper.html(e),i.helper.is(":visible")||i.helper.fadeIn()},_validateSingleItem:function(e){if(null!==s.vregex&&s.vregex instanceof RegExp)return s.vregex.test(e);if(null!==s.vtype)switch(s.vtype){case"alpha":return/^[a-zA-Z_]+$/.test(e);case"alphanum":return/^[a-zA-Z0-9_]+$/.test(e);case"email":return/^(\w+)([\-+.][\w]+)*@(\w[\-\w]*\.){1,5}([A-Za-z]){2,6}$/.test(e);case"url":return/(((^https?)|(^ftp)):\/\/([\-\w]+\.)+\w{2,3}(\/[%\-\w]+(\.\w{2,})?)*(([\w\-\.\?\\\/+@&#;`~=%!]*)(\.\w{2,})?)*\/?)/i.test(e);case"ipaddress":return/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/.test(e)}return!0}},p={_onBlur:function(){if(i.container.removeClass("ms-ctn-focus"),i.collapse(),c=!1,""!==i.getRawValue()&&!0===s.allowFreeEntries){var t={};t[s.displayField]=t[s.valueField]=e.trim(i.getRawValue()),i.addToSelection(t)}g._renderSelection(),!1===i.isValid()?i.container.addClass(s.invalidCls):""!==i.input.val()&&!1===s.allowFreeEntries&&(i.empty(),g._updateHelper("")),e(i).trigger("blur",[i])},_onComboItemMouseOver:function(t){var n=e(t.currentTarget);n.hasClass("ms-res-item-disabled")||(i.combobox.children().removeClass("ms-res-item-active"),n.addClass("ms-res-item-active"))},_onComboItemSelected:function(t){e(t.currentTarget).hasClass("ms-res-item-disabled")||g._selectItem(e(t.currentTarget))},_onFocus:function(){i.input.trigger("focus")},_onInputClick:function(){!1===i.isDisabled()&&c&&!0===s.toggleOnClick&&(s.expanded?i.collapse():i.expand())},_onInputFocus:function(){if(!1===i.isDisabled()&&!c){c=!0,i.container.addClass("ms-ctn-focus"),i.container.removeClass(s.invalidCls);var t=i.getRawValue().length;!0===s.expandOnFocus&&i.expand(),r.length===s.maxSelection?g._updateHelper(s.maxSelectionRenderer.call(this,r.length)):t<s.minChars&&g._updateHelper(s.minCharsRenderer.call(this,s.minChars-t)),g._renderSelection(),e(i).trigger("focus",[i])}},_onKeyDown:function(t){var n=i.combobox.find(".ms-res-item-active:not(.ms-res-item-disabled):first"),a=i.input.val();if(e(i).trigger("keydown",[i,t]),9!==t.keyCode||!1!==s.useTabKey&&(!0!==s.useTabKey||0!==n.length||0!==i.input.val().length))switch(t.keyCode){case 8:0===a.length&&i.getSelection().length>0&&"inner"===s.selectionPosition&&(r.pop(),g._renderSelection(),e(i).trigger("selectionchange",[i,i.getSelection()]),i.input.attr("placeholder","inner"===s.selectionPosition&&i.getValue().length>0?"":s.placeholder),i.input.trigger("focus"),t.preventDefault());break;case 9:case 27:t.preventDefault();break;case 13:(""!==a||s.expanded)&&t.preventDefault();break;case 188:!0===s.useCommaKey&&t.preventDefault();break;case 17:m=!0;break;case 40:t.preventDefault(),g._moveSelectedRow("down");break;case 38:t.preventDefault(),g._moveSelectedRow("up");break;default:r.length===s.maxSelection&&t.preventDefault()}else p._onBlur()},_onKeyUp:function(t){var n,a=i.getRawValue(),l=e.trim(i.input.val()).length>0&&(!s.maxEntryLength||e.trim(i.input.val()).length<=s.maxEntryLength),c={};if(e(i).trigger("keyup",[i,t]),clearTimeout(o),27===t.keyCode&&s.expanded&&i.combobox.hide(),9===t.keyCode&&!1===s.useTabKey||t.keyCode>13&&t.keyCode<32)17===t.keyCode&&(m=!1);else switch(t.keyCode){case 38:case 40:t.preventDefault();break;case 13:case 9:case 188:if(188!==t.keyCode||!0===s.useCommaKey){if(t.preventDefault(),!0===s.expanded&&(n=i.combobox.find(".ms-res-item-active:not(.ms-res-item-disabled):first")).length>0)return void g._selectItem(n);!0===l&&!0===s.allowFreeEntries&&(c[s.displayField]=c[s.valueField]=e.trim(a),i.addToSelection(c),i.collapse(),i.input.trigger("focus"));break}default:r.length===s.maxSelection?g._updateHelper(s.maxSelectionRenderer.call(this,r.length)):a.length<s.minChars?(g._updateHelper(s.minCharsRenderer.call(this,s.minChars-a.length)),!0===s.expanded&&i.collapse()):s.maxEntryLength&&a.length>s.maxEntryLength?(g._updateHelper(s.maxEntryRenderer.call(this,a.length-s.maxEntryLength)),!0===s.expanded&&i.collapse()):(i.helper.hide(),s.minChars<=a.length&&(o=setTimeout((function(){!0===s.expanded?g._processSuggestions():i.expand()}),s.typeDelay)))}},_onTagTriggerClick:function(t){i.removeFromSelection(e(t.currentTarget).data("json"))},_onTriggerClick:function(){if(!1===i.isDisabled()&&(!0!==s.expandOnFocus||r.length!==s.maxSelection))if(e(i).trigger("triggerclick",[i]),!0===s.expanded)i.collapse();else{var t=i.getRawValue().length;t>=s.minChars?(i.input.trigger("focus"),i.expand()):g._updateHelper(s.minCharsRenderer.call(this,s.minChars-t))}},_onWindowResized:function(){g._renderSelection()}};null!==t&&g._render(t)};e.fn.magicSuggest=function(n){var i=e(this);return 1===i.length&&i.data("magicSuggest")?i.data("magicSuggest"):(i.each((function(i){var a=e(this);if(!a.data("magicSuggest")){"select"===this.nodeName.toLowerCase()&&(n.data=[],n.value=[],e.each(this.children,(function(t,i){i.nodeName&&"option"===i.nodeName.toLowerCase()&&(n.data.push({id:i.value,name:i.text}),e(i).attr("selected")&&n.value.push(i.value))})));var s={};e.each(this.attributes,(function(e,t){s[t.name]="value"===t.name&&""!==t.value?JSON.parse(t.value):t.value}));var o=new t(this,e.extend([],e.fn.magicSuggest.defaults,n,s));a.data("magicSuggest",o),o.container.data("magicSuggest",o)}})),1===i.length?i.data("magicSuggest"):i)},e.fn.magicSuggest.defaults={}}(jQuery)}},t={};function n(i){var a=t[i];if(void 0!==a)return a.exports;var s=t[i]={exports:{}};return e[i](s,s.exports,n),s.exports}n(318),$((function(){$("#autocomplete").magicSuggest({typeDelay:3,data:"/autocomplete",ajaxConfig:{headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}},valueField:"slug",hideTrigger:!0,highlight:!0,useTabKey:!0,maxSelection:1,maxSelectionRenderer:function(){return"Presiona buscar"},minChars:3,minCharsRenderer:function(e){return"Continua escribiendo"},noSuggestionText:"Sin coincidencias",selectionRenderer:function(e){var t="";return e.brand&&(t+=" "+e.brand),e.category&&(e.brand&&(t+="| "),t+=" "+e.category),t?e.title+" ("+t+")":e.title},renderer:function(e){return'\n                <div class="autocomplete-box">\n                    <div class="autocomplete-image">\n                        <img src="'.concat(e.image,'">\n                    </div>\n                    <div class="autocomplete-info">\n                        <span class="autocomplete-title">').concat(e.title,'</span>\n                        <span class="autocomplete-cats">').concat(e.category," / ").concat(e.subcategory,'</span>\n                        <div class="autocomplete-additional">\n                            <span class="autocomplete-brand">').concat(e.brand,'</span>\n                            <span class="autocomplete-price">$ ').concat(e.price,"</span>\n                        </div>\n                    </div>\n                </div>\n            ")}})})),$(document).on("click",".ms-res-item",(function(e){$("#do-search").click()})),$(document).on("keydown",'.ms-sel-ctn > input[type="text"]',(function(e){13!==e.which&&13!==e.keyCode||$("#do-search").click()}))})();
//# sourceMappingURL=search.js.map