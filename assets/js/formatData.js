// JavaScript Document
function setProductAdminData(table) {
    var key;
    $.each(table, function (key, value) {
        document.getElementById(`prod_img${value.id}`).value = value.product_image;
        document.getElementById(`prod_img2${value.id}`).value = value.product_image2;
        document.getElementById(`prod_img3${value.id}`).value = value.product_image3;
        document.getElementById(`prod_name${value.id}`).value = value.product_name;
        document.getElementById(`prod_price${value.id}`).value = value.product_price;
        document.getElementById(`prod_desc${value.id}`).value = value.product_desc;
    });
}/*
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
        var add_product_template = `<div class="row mb-3">
        <form onSubmit="if(!confirm('Are you sure you would like to do this?')){return false;}" method = "post" action = "">
              <div class = "col-2 float-left">
                    <p>Add New Product:</p>
              </div>
              <div class = "col-2 float-left">
                    <input type = "text" name = "prod_img">
              </div>
              <div class = "col-2 float-left">
                    <input type = "text" name = "prod_name">
              </div>
              <div class = "col-2 float-left">
                  <input type = "text" name = "prod_desc">
              </div>
              <div class = "col-2 float-left">
                  <input type = "text" name = "prod_price">
              </div>
              <div class = "col-2 float-left">
                  <input type="submit" name = "add" value="Add">
              </div>
        </form>
        </div>`
        items.push(add_product_template);
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
                      <input type="submit" name = "update" value="Update">
                  </div>
                  <div class = "col-1 float-left">
                      <input type="submit" name = "delete" value="Delete">
                  </div>
            </form>
            </div>`
            items.push(product_template);
            items.push(product_row_template);
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
}*/

function productAdminPanel(url) {
    $.ajax({
        url: url,
        dataType: "json",
        data: {},
        async: false,
        success: function(table) {
        var key = -1;
        var items = [];
        var row_template = `\t<div id = "accordion">`;
        items.push(row_template);
        $.each(table, function (key, value) {
            var product_template = `<div class="card">
                <div class="card-header" id="heading${value.id}">
                <div class = "row">
                <div class = "col-lg-2">
                    <h5>${value.id}</h5>
                </div>
                <div class = "col-lg-8">
                    <h5>${value.product_name}</h5>
                </div>
                <div class = "col-lg-2">
                <h5 class="mb-0">
                    <button class="btn btn-primary my-2 my-sm-0 w-100" data-toggle="collapse" data-target="#collapse${value.id}" aria-expanded="true" aria-controls="collapseOne">
                    See Details
                    </button>
                </h5>
                </div>
                </div>
                </div>

                <div id="collapse${value.id}" class="collapse" aria-labelledby="heading${value.id}" data-parent="#accordion">
                <div class="card-body">
                <form onSubmit="if(!confirm('Are you sure you would like to do this?')){return false;}" method = "post" action = "">
                    <div class = "row mb-1">
                    <div class="input-group input-group-lg">
                        <div class = "col-lg-4">
                            <h5>Image 1</h5>
                            <input class = "w-100" type = "text" id = "prod_img${value.id}" name = "prod_img">
                        </div>
                        <div class = "col-lg-4">
                            <h5>Image 2</h5>
                            <input class = "w-100" type = "text" id = "prod_img2${value.id}" name = "prod_img2">
                        </div>
                        <div class = "col-lg-4">
                            <h5>Image 3</h5>
                            <input class = "w-100" type = "text" id = "prod_img3${value.id}" name = "prod_img3">
                        </div>
                    </div>
                    </div>
                    <div class = "row">
                        <div class = "col-lg-4">
                            <p>Product Name: </p>
                        </div>
                        <div class = "col-lg-4">
                            <input class = "w-100" type = "text" id = "prod_name${value.id}" name = "prod_name">
                        </div>
                         <div class = "col-lg-4">
                            <div class = "row">
                                <div class = "col-lg-4">
                                    <p>Product Qty:</p>
                                </div>
                                <div class = "col-lg-8">
                                    <input class = "w-100" type = "text" id = "${value.id}" name = "prod_id" value = "${value.id}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-lg-4">
                            <p>Product ID: </p>
                        </div>
                        <div class = "col-lg-4">
                            <input class = "w-100" type = "text" id = "${value.id}" name = "prod_id" value = "${value.id}" readonly>
                        </div>
                        <div class = "col-lg-4">
                            <div class = "row">
                                <div class = "col-lg-4">
                                    <p>Discount:</p>
                                </div>
                                <div class = "col-lg-8">
                                    <input class = "w-100" type = "text" id = "${value.id}" name = "prod_id" value = "${value.id}" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class = "row">
                        <div class = "col-lg-4">
                            <p>Product Price: </p>
                        </div>
                        <div class = "col-lg-4">
                            <input class = "w-100" type = "text" id = "prod_price${value.id}" name = "prod_price">
                        </div>
                        <div class = "col-lg-4">
                            <input class="btn btn-primary my-2 my-sm-0 w-100" type="submit" name = "update" value="Update">
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-lg-4">
                            <p>Product Description: </p>
                        </div>
                        <div class = "col-lg-4">
                            <input class = "w-100" type = "text" id = "prod_desc${value.id}" name = "prod_desc">
                        </div>
                        <div class = "col-lg-4">
                            <input class="btn btn-primary my-2 my-sm-0 w-100" type="submit" name = "delete" value="Delete">
                        </div>
                    </div>
                    </div>
                </form>

                </div>
            </div>`;
            items.push(product_template);
        });
        $('<div/>', {
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

function formatUserData(url) {
    $.ajax({
        url: url,
        dataType: "json",
        data: {},
        async: false,
        success: function(table) {
        var key = -1;
        var items = [];
        var row_template = `\t<div id = "accordion">`;
        items.push(row_template);
        $.each(table, function (key, value) {
            var user_template = `<div class="card">
                <div class="card-header" id="heading${value.user_id}">
                <div class = "row">
                <div class = "col-3">
                    <h5>${value.user_id}</h5>
                </div>
                <div class = "col-6">
                    <h5>${value.email}</h5>
                </div>
                <div class = "col-3">
                <h5 class="mb-0">
                    <button class="btn btn-primary my-2 my-sm-0 collapsed" data-toggle="collapse" data-target="#collapse${value.user_id}" aria-expanded="true" aria-controls="collapseOne">
                    See Details
                    </button>
                </h5>
                </div>
                </div>
                </div>

                <div id="collapse${value.user_id}" class="collapse" aria-labelledby="heading${value.user_id}" data-parent="#accordion">
                <div class="card-body">
                <div class = "row">
                    <div class = "col-4">
                        <p>${value.first_name} ${value.last_name}</p>
                    </div>
                    <div class = "col-4">
                        <p>${value.user_id}</p>
                    </div>
                    <div class = "col-4">
                        <p><a href = "">Contact</a></p>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-4">
                        <p>Email: </p>
                    </div>
                    <div class = "col-8">
                        <p>${value.email}</p>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-4">
                        <p>Address: </p>
                    </div>
                    <div class = "col-8">
                        <p>${value.street_address}, ${value.city} ${value.state}</p>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-4">
                        <p>Billing: </p>
                    </div>
                    <div class = "col-8">
                        <p>${value.street_address}, ${value.city} ${value.state}</p>
                    </div>
                </div>
                </div>
                </div>
            </div>`;
            items.push(user_template);
        });
        $('<div/>', {
            html:items.join("")
        }).appendTo(".users");
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
                                    \t\t\t\t<a href = "/assets/php/product.php?id=${value.id}" class="btn btn-primary mt-5 mb-3" role="button" aria-pressed="true">See details</a>
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

function formatCartData(url) {
    $.ajax({
        url: url,
        dataType: "json",
        data: {},
        async: false,
        success: function(table) {
        var key = -1;
        var numProducts = 0;
        var productTotal = 0;
        var taxRate = 0.0825;
        var taxTotal = 0;
        var items = [];
        var product_row_template = `\t<div class = "row border-bottom">`;
        $.each(table, function (key, value) {
            productTotal += parseFloat(value.product_price.replace(/,/, ''));
            taxTotal += (parseFloat(value.product_price.replace(/,/, '')) * taxRate);
            var product_template = `\t<div class="col-lg-3 p-1 my-auto"> \
                                        <img style = "height: 40%" class = "img-fluid" id="${key}" src= "${value.product_image}">
                                    </div>
                                    <div class="col-lg-6 p-1 my-auto text-center">
                                        <p style = "height: 20%" id="${key}" class = "card-title text-truncate">${value.product_name}</p>
                                    </div>
                                    <div class = "col-lg-3 p-1 my-auto text-center">
                                        <p class="card-subtitle mb-2">$${value.product_price}</p>
                                    </div>
                                    </div>`;
            items.push(product_row_template);
            items.push(product_template);
            numProducts++;
        });
        productTotal = productTotal.toFixed(2);
        taxTotal = taxTotal.toFixed(2);
        var total = parseFloat(productTotal) + parseFloat(taxTotal);
        total = total.toFixed(2);
        var totalRowTemplate = `<div class="col-lg-10 p-1 my-auto"> \
                                    <h3>Subtotal: </h3>
                                    <h3>Tax: </h3>
                                    <h3 class = "mt-4">Total: </h3>
                                </div>
                                <div class = "col-lg-2 p-1 my-auto text-right">
                                <h3>$${productTotal}</h3>
                                <h3>$${taxTotal}</h3>
                                <h3 class = "mt-4">$${total}</h3>
                                </div>
                                </div>`;
        items.push(product_row_template);
        items.push(totalRowTemplate);
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

function formatOrderData(url) {
    $.ajax({
        url: url,
        dataType: "json",
        data: {},
        async: false,
        success: function(table) {
        var key = -1;
        var numProducts = 0;
        var productTotal = 0;
        var taxRate = 0.0825;
        var taxTotal = 0;
        var items = [];
        var product_row_template = `\t<div class = "row border-bottom">`;
        $.each(table, function (key, value) {
            productTotal += parseFloat(value.product_price.replace(/,/, ''));
            taxTotal += (parseFloat(value.product_price.replace(/,/, '')) * taxRate);
            var product_template = `\t<div class="col-lg-3 p-1 my-auto"> \
                                        <img style = "height: 40%" class = "img-fluid" id="${key}" src= "${value.product_image}">
                                    </div>
                                    <div class="col-lg-6 p-1 my-auto text-center">
                                        <p style = "height: 20%" id="${key}" class = "card-title text-truncate">${value.product_name}</p>
                                    </div>
                                    <div class = "col-lg-3 p-1 my-auto text-center">
                                        <p class="card-subtitle mb-2">$${value.product_price}</p>
                                    </div>
                                    </div>`;
            items.push(product_row_template);
            items.push(product_template);
            numProducts++;
        });
        productTotal = productTotal.toFixed(2);
        taxTotal = taxTotal.toFixed(2);
        var total = parseFloat(productTotal) + parseFloat(taxTotal);
        total = total.toFixed(2);
        var totalRowTemplate = `<div class="col-lg-10 p-1 my-auto"> \
                                    <h3>Subtotal: </h3>
                                    <h3>Tax: </h3>
                                    <h3 class = "mt-4">Total: </h3>
                                </div>
                                <div class = "col-lg-2 p-1 my-auto text-right">
                                <h3>$${productTotal}</h3>
                                <h3>$${taxTotal}</h3>
                                <h3 class = "mt-4">$${total}</h3>
                                </div>
                                </div>`;
        items.push(product_row_template);
        items.push(totalRowTemplate);
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
