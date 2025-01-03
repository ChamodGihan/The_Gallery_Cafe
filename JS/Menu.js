document.addEventListener('DOMContentLoaded', () => {
    const categoryItems = document.querySelectorAll('.menu-categories li');
    const menuItems = document.querySelectorAll('.menu-item');
    const subcategorySriLankaContainer = document.getElementById('SriLanka-subcategories');
    const subcategoryChineseContainer = document.getElementById('Chinese-subcategories');
    const subcategoryItalianContainer = document.getElementById('Italian-subcategories');
    const subcategorySriLankaItems = document.querySelectorAll('#SriLanka-subcategories li');
    const subcategoryChineseItems = document.querySelectorAll('#Chinese-subcategories li');
    const subcategoryItalianItems = document.querySelectorAll('#Italian-subcategories li');

    categoryItems.forEach(item => {
        item.addEventListener('click', () => {
            categoryItems.forEach(cat => cat.classList.remove('active'));
            item.classList.add('active');

            const category = item.getAttribute('data-category');

            if (category === 'Sri Lanka') {
                subcategorySriLankaContainer.style.display = 'block';
                subcategoryChineseContainer.style.display = 'none';
                subcategoryItalianContainer.style.display = 'none';
            } else if (category === 'Chinese') {
                subcategorySriLankaContainer.style.display = 'none';
                subcategoryChineseContainer.style.display = 'block';
                subcategoryItalianContainer.style.display = 'none';
            } else if (category === 'Italian') {
                subcategorySriLankaContainer.style.display = 'none';
                subcategoryChineseContainer.style.display = 'none';
                subcategoryItalianContainer.style.display = 'block';
            } else {
                subcategorySriLankaContainer.style.display = 'none';
                subcategoryChineseContainer.style.display = 'none';
                subcategoryItalianContainer.style.display = 'none';
                subcategorySriLankaItems.forEach(subcat => subcat.classList.remove('active'));
                subcategorySriLankaItems[0].classList.add('active');
                subcategoryChineseItems.forEach(subcat => subcat.classList.remove('active'));
                subcategoryChineseItems[0].classList.add('active');
                subcategoryItalianItems.forEach(subcat => subcat.classList.remove('active'));
                subcategoryItalianItems[0].classList.add('active');
            }

            filterMenuItems(category, 'all');
        });
    });

    subcategorySriLankaItems.forEach(item => {
        item.addEventListener('click', () => {
            subcategorySriLankaItems.forEach(subcat => subcat.classList.remove('active'));
            item.classList.add('active');

            const subcategory = item.getAttribute('data-subcategory');
            const activeCategoryItem = document.querySelector('.menu-categories li.active');
            const category = activeCategoryItem ? activeCategoryItem.getAttribute('data-category') : 'all';

            filterMenuItems(category, subcategory);
        });
    });

    subcategoryChineseItems.forEach(item => {
        item.addEventListener('click', () => {
            subcategoryChineseItems.forEach(subcat => subcat.classList.remove('active'));
            item.classList.add('active');

            const subcategory = item.getAttribute('data-subcategory');
            const activeCategoryItem = document.querySelector('.menu-categories li.active');
            const category = activeCategoryItem ? activeCategoryItem.getAttribute('data-category') : 'all';

            filterMenuItems(category, subcategory);
        });
    });

    subcategoryItalianItems.forEach(item => {
        item.addEventListener('click', () => {
            subcategoryItalianItems.forEach(subcat => subcat.classList.remove('active'));
            item.classList.add('active');

            const subcategory = item.getAttribute('data-subcategory');
            const activeCategoryItem = document.querySelector('.menu-categories li.active');
            const category = activeCategoryItem ? activeCategoryItem.getAttribute('data-category') : 'all';

            filterMenuItems(category, subcategory);
        });
    });

    function filterMenuItems(category, subcategory) {
        menuItems.forEach(menuItem => {
            const itemCategory = menuItem.getAttribute('data-category');
            const itemSubcategory = menuItem.getAttribute('data-subcategory');

            if (
                (category === 'all' || itemCategory === category) &&
                (subcategory === 'all' || itemSubcategory === subcategory)
            ) {
                menuItem.style.display = 'block';
            } else {
                menuItem.style.display = 'none';
            }
        });
    }
});
