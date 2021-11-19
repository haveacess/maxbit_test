<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <title>Products</title>
</head>
<script>
    $(function() {

        fetch('/api/products')
            .then(function(response) {
                if (!response.ok) {
                    console.log('Error with Status Code: ' + response.status);
                    return;
                }

                response.json().then(function(products) {
                    $('#nestedSet').append(getCategoryHtml(null, products));
                });
            })
            .catch(function(err) {
                console.log('Error: ' + err);
            });
    });


    function getCategoryHtml(parentId = null, categories) {

        let subCategories = categories.filter(function(category) {
            return category.parent_id == parentId;
        });

        let html = '<ul>';
        subCategories.forEach(function(category) {
            html += '<li>' + category.title + ' . Price: '  + category.price + '</li>';
            html += getCategoryHtml(category.id, categories) || '';

        });
        html += '</ul>';

        return html;
    }
</script>

<body>
    <div id="nestedSet"></div>
</body>

</html>