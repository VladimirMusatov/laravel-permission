const adminNavLinks = document.querySelectorAll('.ad-nav-link');
const tabsItems = document.querySelectorAll('.tabs__item');

adminNavLinks.forEach(function(item){
	item.addEventListener('click',function(){
		let currentBtn = item;
		let tabId = currentBtn.getAttribute("data-tab");
		let currentTab = document.querySelector(tabId);

		if(!currentBtn.classList.contains('active')){
			adminNavLinks.forEach(function(item){
				item.classList.remove('active');
			});
			tabsItems.forEach(function(item){
				item.classList.remove('active');	
			});

			currentTab.classList.add('active');
			currentBtn.classList.add('active');
		}
	});
});