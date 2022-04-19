// JavaScript Document
function setProductAdminData(table) {
    var key;
    $.each(table, function (key, value) {
        document.getElementById(`prod_img${value.id}`).value = value.product_image;
        document.getElementById(`prod_name${value.id}`).value = value.product_name;
        document.getElementById(`prod_price${value.id}`).value = value.product_price;
        document.getElementById(`prod_desc${value.id}`).value = value.product_desc;
    });
}
function productAdminPanel(url) {
    $.ajax({
        url: url,
        dataType: "json",
        data: {},
        async: false,
        success: function(table) {
        var key = -1;
        var numProducts = 0;
        var items = [];
        var product_row_template = `</div>`;
        $.each(table, function (key, value) {
            console.log(value);
            var product_template = `<div class="row">
            <form onSubmit="if(!confirm('Are you sure you would like to do this?')){return false;}" method = "post" action = "">
                  <div class = "col-2 float-left">
                        <input type = "text" id = "${value.id}" name = "prod_id" value = "${value.id}" readonly>
                  </div>
                  <div class = "col-2 float-left">
                        <input type = "text" id = "prod_img${value.id}" name = "prod_img">
                  </div>
                  <div class = "col-2 float-left">
                        <input type = "text" id = "prod_name${value.id}" name = "prod_name">
                  </div>
                  <div class = "col-2 float-left">
                      <input type = "text" id = "prod_desc${value.id}" name = "prod_desc">
                  </div>
                  <div class = "col-2 float-left">
                      <input type = "text" id = "prod_price${value.id}" name = "prod_price">
                  </div>
                  <div class = "col-1 float-left">
                      <input type="submit" name = "submit" value="Update">
                  </div>
                  <div class = "col-1 float-left">
                      <input type="submit" name = "delete" value="Delete">
                  </div>
            </form>
            </div>`
            items.push(product_template);
            items.push(product_row_template);
            // document.getElementById(`prod_img${key}`).value = value.product_image;
            // document.getElementById(`prod_name${key}`).value = value.product_price;
            // document.getElementById(`prod_price${key}`).value = value.product_name;
            // document.getElementById(`prod_desc${key}`).value = value.product_desc;
            numProducts++;
        });
        $('<div/>', {
            "class": "container p-0",
            html:items.join("")
        }).appendTo(".product");
        setProductAdminData(table);
    },
    error: function(x,y,z) {
        console.log(x.responseText);
        console.log(y);
        console.log(z);
    }
});
}
function formatProductData(url) {
    $.ajax({
        url: url,
        dataType: "json",
        data: {},
        async: false,
        success: function(table) {
        var key = -1;
        var numProducts = 0;
        var items = [];
        var product_row_template = `\t<div class = "row">`;
        $.each(table, function (key, value) {
            console.log(value);
            var product_template = `\t<div class="col-lg-3 col-sm-6"> \
                                    \t\t<div class="card" style = "height: 400px; width = 300px"> \
                                    \t\t\t<div class="card-body"> \
                                    \t\t\t\t<img style = "height: 40%" class = "img-fluid" id="${key}" src= "${value.product_image}">
                                    \t\t\t\t<p style = "height: 20%" id="${key}" class = "card-title text-truncate">${value.product_name}</p>
                                    \t\t\t\t<p class="card-subtitle mb-2">$${value.product_price}</p>
                                    \t\t\t\t<a href = "product.php?${value.id}" class="btn btn-primary mt-5 mb-3" role="button" aria-pressed="true">See details</a>
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
        }).appendTo(".product");
    },
    error: function(x,y,z) {
        console.log(x.responseText);
        console.log(y);
        console.log(z);
    }
});
}
