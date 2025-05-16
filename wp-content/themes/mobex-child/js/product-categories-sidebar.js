jQuery(document).ready(function ($) {
    const categoriesWrapper = $('.product-categories-wrapper');
    const categoryScreen = $('.category-screen');
    const mainLevel = $('.main-level');
    let categoryHistory = [{
        level: 0,
        content: mainLevel.clone(),
        title: 'Categories'
    }];
    let historyIndex = 0;

    function showCategories(levelContent, title) {
        categoriesWrapper.hide();
        categoryScreen.empty().append(levelContent).show();
        categoryScreen.prepend('<h3>' + title + '</h3>');

        if (historyIndex > 0) {
            if (categoryScreen.find('.back-button').length === 0) {
                categoryScreen.prepend('<button class="back-button">Back</button>');
            }
        } else {
            categoryScreen.find('.back-button').remove();
        }
        categoryScreen.find('.sub-level').show();
    }

    $(document).on('click', '.category-link', function (e) {
        e.preventDefault();
        console.log('Category link clicked!');
        const clickedCategoryItem = $(this).parent();
        const categoryId = clickedCategoryItem.data('category-id');
        const categoryName = clickedCategoryItem.data('category-name');
        const categoryUrl = clickedCategoryItem.data('category-url'); // Get the URL
        const subLevel = clickedCategoryItem.find('.sub-level');

        if (subLevel.length) {
            historyIndex++;
            categoryHistory[historyIndex] = {
                level: historyIndex,
                content: subLevel.clone(),
                title: categoryName
            };
            showCategories(subLevel.clone(), categoryName);
        } else {
            window.location.href = categoryUrl; // Redirect to the category page
        }
    });

    categoryScreen.on('click', '.back-button', function () {
        historyIndex--;
        if (historyIndex === 0) {
            categoriesWrapper.show();
            categoryScreen.hide().empty();
        } else {
            showCategories(categoryHistory[historyIndex].content.clone(), historyHistory[historyIndex].title);
        }

    });

    // Add this function to reset the Off-Canvas content
    function resetCategories() {
         categoryHistory = [{
            level: 0,
            content: mainLevel.clone(),
            title: 'Categories'
        }];
        historyIndex = 0;
        categoryScreen.hide().empty(); // Clear the categoryScreen
        categoriesWrapper.show().empty().append(mainLevel.clone()); //show main categories
    }

    // Find the element that triggers the opening of the Off-Canvas
    const offCanvasTrigger = $('.elementor-menu-toggle'); //  You might need to adjust this selector

    // Attach an event listener to the Off-Canvas trigger
    offCanvasTrigger.on('click', function () {
        resetCategories(); // Call the reset function when the Off-Canvas is opened
        showCategories(categoryHistory[historyIndex].content.clone(), categoryHistory[historyIndex].title); // Initial display here
    });


});
