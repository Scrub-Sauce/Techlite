$.getJSON("test-sql.php", function (table) {
    var key = -1;
    var numProducts = 0;
    var items = [];
    var product_row_template = `\t<div class = "row">`;

    $.each(table, function (key, value) {
        var product_template = `\t<div class="col-lg-3 col-sm-6"> \
                                \t\t<div class="card" style = "height: 400px; width = 300px"> \
                                \t\t\t<div class="card-body"> \
                                \t\t\t\t<img style = "height: 40%" class = "img-fluid" id="${key}" src= "${value.product_image}">
                                \t\t\t\t<p style = "height: 30%"  id="${key}" class = "card-title text-truncate">${value.product_name}</p>
                                \t\t\t\t<p style = "height: 30%"  class="card-subtitle mb-2">$${value.product_price}</p>
                                \t\t\t</div>
                                \t\t</div>
                                \t</div>`
        if (numProducts % 4 != 0) {
            items.push(product_template);
            numProducts++;
            return;
        } else {
            items.push("\t</div>");
        }
        items.push(product_row_template);
        items.push(product_template);
        numProducts++;
    });
    $('<div/>', {
        "class": "container",
        html:items.join("")
    }).appendTo("body");
});
