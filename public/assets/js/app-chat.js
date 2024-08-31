document.addEventListener("DOMContentLoaded",function(){{let e=document.querySelector(".app-chat-contacts .sidebar-body"),t=[].slice.call(document.querySelectorAll(".chat-contact-list-item:not(.chat-contact-list-item-title)")),a=document.querySelector(".chat-history-body"),c=document.querySelector(".app-chat-sidebar-left .sidebar-body"),r=document.querySelector(".app-chat-sidebar-right .sidebar-body"),l=[].slice.call(document.querySelectorAll(".form-check-input[name='chat-user-status']")),s=$(".chat-sidebar-left-user-about"),o=document.querySelector(".form-send-message"),n=document.querySelector(".message-input"),i=document.querySelector(".chat-search-input"),d=$(".speech-to-text"),u={active:"avatar-online",offline:"avatar-offline",away:"avatar-away",busy:"avatar-busy"};function p(){a.scrollTo(0,a.scrollHeight)}function v(e,a,c,t){e.forEach(e=>{var t=e.textContent.toLowerCase();!c||-1<t.indexOf(c)?(e.classList.add("d-flex"),e.classList.remove("d-none"),a++):e.classList.add("d-none")}),0==a?t.classList.remove("d-none"):t.classList.add("d-none")}e&&new PerfectScrollbar(e,{wheelPropagation:!1,suppressScrollX:!0}),a&&new PerfectScrollbar(a,{wheelPropagation:!1,suppressScrollX:!0}),c&&new PerfectScrollbar(c,{wheelPropagation:!1,suppressScrollX:!0}),r&&new PerfectScrollbar(r,{wheelPropagation:!1,suppressScrollX:!0}),p(),s.length&&s.maxlength({alwaysShow:!0,warningClass:"label label-success bg-success text-white",limitReachedClass:"label label-danger",separator:"/",validate:!0,threshold:120}),l.forEach(e=>{e.addEventListener("click",e=>{var t=document.querySelector(".chat-sidebar-left-user .avatar"),e=e.currentTarget.value,t=(t.removeAttribute("class"),Helpers._addClass("avatar avatar-xl chat-sidebar-avatar "+u[e],t),document.querySelector(".app-chat-contacts .avatar"));t.removeAttribute("class"),Helpers._addClass("flex-shrink-0 avatar "+u[e]+" me-3",t)})}),t.forEach(e=>{e.addEventListener("click",e=>{t.forEach(e=>{e.classList.remove("active")}),e.currentTarget.classList.add("active")})}),i&&i.addEventListener("keyup",e=>{var e=e.currentTarget.value.toLowerCase(),t=document.querySelector(".chat-list-item-0"),a=document.querySelector(".contact-list-item-0"),c=[].slice.call(document.querySelectorAll("#chat-list li:not(.chat-contact-list-item-title)")),r=[].slice.call(document.querySelectorAll("#contact-list li:not(.chat-contact-list-item-title)"));v(c,0,e,t),v(r,0,e,a)}),o.addEventListener("submit",e=>{e.preventDefault(),n.value&&((e=document.createElement("div")).className="chat-message-text mt-2",e.innerHTML='<p class="mb-0 text-break">'+n.value+"</p>",document.querySelector("li:last-child .chat-message-wrapper").appendChild(e),n.value="",p())});let h=document.querySelector(".chat-history-header [data-target='#app-chat-contacts']"),m=document.querySelector(".app-chat-sidebar-left .close-sidebar");var b,f,y;h.addEventListener("click",e=>{m.removeAttribute("data-overlay")}),d.length&&null!=(b=b||webkitSpeechRecognition)&&(f=new b,y=!1,d.on("click",function(){let t=$(this);!(f.onspeechstart=function(){y=!0})===y&&f.start(),f.onerror=function(e){y=!1},f.onresult=function(e){t.closest(".form-send-message").find(".message-input").val(e.results[0][0].transcript)},f.onspeechend=function(e){y=!1,f.stop()}}))}});