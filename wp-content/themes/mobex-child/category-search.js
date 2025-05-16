jQuery(document).ready(function ($) {
    var searchInput = jQuery('#category-search-input');
    var categoryDropdown = jQuery('#category-dropdown');
    var isDropdownOpen = false;

    // Function to fetch category suggestions via AJAX.
    function getCategorySuggestions(searchTerm) {
        console.log('getCategorySuggestions called with:', searchTerm); // DEBUG
        jQuery.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_category_suggestions',
                term: searchTerm,
            },
            success: function (response) {
                console.log('AJAX success:', response); // DEBUG
                if (response.success) {
                    displayCategorySuggestions(response.data);
                } else {
                    console.error('Error fetching categories:', response.data.message);
                    categoryDropdown.hide();
                    isDropdownOpen = false;
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown);
                categoryDropdown.hide();
                isDropdownOpen = false;
            },
        });
    }

    // Function to display the category suggestions in the dropdown.
    function displayCategorySuggestions(categories) {
        console.log('displayCategorySuggestions called with:', categories); // DEBUG
        categoryDropdown.empty();
        if (categories.length > 0) {
            categories.forEach(function (category) {
                categoryDropdown.append('<option value="' + category.slug + '">' + category.name + '</option>');
            });
            categoryDropdown.show();
            isDropdownOpen = true;
        } else {
            categoryDropdown.hide();
            isDropdownOpen = false;
        }
    }

    // Event listener for the search input field.
    searchInput.on('input', function () {
        var searchTerm = jQuery(this).val();
        if (searchTerm.length >= 3) {
            getCategorySuggestions(searchTerm);
        } else {
            categoryDropdown.hide();
            isDropdownOpen = false;
        }
    });

    // Event listener for selecting a category from the dropdown.
    categoryDropdown.on('change', function () {
        var selectedSlug = jQuery(this).val();
        searchInput.val('');
        jQuery(this).closest('form').submit();
    });

    // Hide the dropdown when the user clicks outside of it
    jQuery(document).on('click', function (event) {
        if (isDropdownOpen && !jQuery(event.target).closest('.category-search-wrapper').length) {
            categoryDropdown.hide();
            isDropdownOpen = false;
        }
    });
});