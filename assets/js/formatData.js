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
}

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
                    <button class="btn btn-info my-2 my-sm-0 w-100" data-toggle="collapse" data-target="#collapse${value.id}" aria-expanded="true" aria-controls="collapseOne">
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
                                    <input class = "w-100" type = "text" id = "${value.id}" name = "prod_qty" value = "${value.product_qty}">
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
                            <input class="btn btn-success my-2 my-sm-0 w-100" type="submit" name = "update" value="Update">
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
                            <input class="btn btn-danger my-2 my-sm-0 w-100" type="submit" name = "delete" value="Delete">
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-lg-4">
                            <p>Add sale: </p>
                        </div>
                        <div class = "col-lg-4">
                            <input class = "w-100" type = "text" name = "sale">
                        </div>
                        <div class = "col-lg-4">
                            <input class="btn btn-warning my-2 my-sm-0 w-100" type="submit" name = "addsale" value="Add Sale">
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

function orderAdminPanel(url) {
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
                    <h5>${value.order_id}</h5>
                </div>
                <div class = "col-6">
                    <h5>${value.order_date}</h5>
                </div>
                <div class = "col-3">
                <h5 class="mb-0">
                    <button class="btn btn-info my-2 my-sm-0 collapsed" data-toggle="collapse" data-target="#collapse${value.order_id}" aria-expanded="true" aria-controls="collapseOne">
                    See Details
                    </button>
                </h5>
                </div>
                </div>
                </div>

                <div id="collapse${value.order_id}" class="collapse" aria-labelledby="heading${value.order_id}" data-parent="#accordion">
                <div class="card-body">
                <form onSubmit="if(!confirm('Are you sure you would like to do this?')){return false;}" method = "post" action = "">
                <div class = "row">
                    <div class = "col-lg-2">
                        <h5>User ID</h5>
                        <input class = "w-100" type = "text" id = "id{value.user_id}" name = "user_id" value = "${value.user_id}" readonly>
                    </div>
                    <div class = "col-lg-6">
                        <h5>Full Name</h5>
                        <input class = "w-100" type = "text" id = "name{value.user_id}" name = "name" value = "${value.first_name} ${value.last_name}">
                    </div>
                    <div class = "col-lg-4">
                        <h5>Contact</h5>
                        <p><a class = "btn btn-success w-100" href = "mailto:${value.email}">Send email</a></p>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-2">
                        <p>Email: </p>
                    </div>
                    <div class = "col-lg-6">
                        <input class = "w-100" type = "text" id = "mail{value.email}" name = "email" value = "${value.email}">
                    </div>
                    <div class = "col-lg-2">
                        <input class = "btn btn-warning w-100" type = "submit" name = "fullfillorder" value = "Fullfill Order">
                    </div>
                    <div class = "col-lg-2">
                        <input class="form-control w-100 text-center" type="text" placeholder="${value.order_status}" readonly>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-2">
                        <p>Phone: </p>
                    </div>
                    <div class = "col-lg-6">
                        <input class = "w-100" type = "text" id = "phone{value.email}" name = "phone" value = "${value.phone_number}">
                    </div>
                    <div class = "col-lg-2">
                        <input class = "btn btn-success w-100" type = "submit" name = "update" value = "Update">
                    </div>
                    <div class = "col-lg-2">
                        <input class = "btn btn-danger w-100" type = "submit" name = "cancelorder" value = "Cancel Order">
                    </div>
                    </div>
                <div class = "row mt-1">
                <div class = "col-lg-12 text-center">
                    <h5>Shipping Info</h5>
                    </div>
                    </div>
                <div class = "row">
                        <div class = "col-lg-3">
                             <p>Address</p>
                             <input class = "w-100" type = "text" id = "add{value.user_id}" name = "sadd" value = "${value.street_address}">
                        </div>
                        <div class = "col-lg-3">
                        <p>City</p>
                             <input class = "w-100" type = "text" id = "city{value.user_id}" name = "scity" value = "${value.city}">
                        </div>
                        <div class = "col-lg-3">
                        <p>State</p>
                             <input class = "w-100" type = "text" id = "state{value.user_id}" name = "sstate" value = "${value.state}">
                        </div>
                        <div class = "col-lg-3">
                        <p>Zip</p>
                             <input class = "w-100" type = "text" id = "zip{value.user_id}" name = "szip" value = "${value.zip}">
                        </div>
                </div>
                <div class = "row mt-1">
                <div class = "col-lg-12 text-center">
                    <h5>Billing Info</h5>
                    </div>
                    </div>
                <div class = "row">
                        <div class = "col-lg-3">
                             <p>Address</p>
                             <input class = "w-100" type = "text" id = "add{value.user_id}" name = "badd" value = "${value.street_address}">
                        </div>
                        <div class = "col-lg-3">
                        <p>City</p>
                             <input class = "w-100" type = "text" id = "city{value.user_id}" name = "bcity" value = "${value.city}">
                        </div>
                        <div class = "col-lg-3">
                        <p>State</p>
                             <input class = "w-100" type = "text" id = "state{value.user_id}" name = "bstate" value = "${value.state}">
                        </div>
                        <div class = "col-lg-3">
                        <p>Zip</p>
                             <input class = "w-100" type = "text" id = "zip{value.user_id}" name = "bzip" value = "${value.zip}">
                        </div>
                </div>
                <div class = "row mt-1">
                <div class = "col-lg-12 text-center">
                    <h5>Order Contents</h5>
                    </div>
                    </div>
                <div class = "row">
                <div class = "col-lg-3">
                        <p>Product Name</p>
                            <input class = "w-100" type = "text" id = "prod_name${value.id}" name = "prod_name">
                        </div>
                        <div class = "col-lg-3">
                        <p>Product ID</p>
                             <input class = "w-100" type = "text" id = "prod_id${value.id}" name = "prod_id">
                        </div>
                        <div class = "col-lg-3">
                        <p>Product Price</p>
                             <input class = "w-100" type = "text" id = "prod_price${value.id}" name = "prod_price">
                        </div>
                        <div class = "col-lg-3">
                        <p>Quantity</p>
                             <input class = "w-100" type = "text" id = "zip{value.user_id}" name = "bzip" value = "${value.zip}">
                        </div>
                </div>
                <div class = "row mt-1">
                <div class = "col-lg-12 text-center">
                    <h5>Order Subtotal</h5>
                    </div>
                    </div>
                <div class = "row">
                <div class = "col-lg-12 text-center">
                        <p>Order Total</p>
                            <input class = "w-100" type = "text" id = "add{value.user_id}" name = "badd" value = "${value.street_address}">
                        </div>
                </div>
                </div>
                </div>
            </form>
            </div>`;
            items.push(user_template);
        });
        $('<div/>', {
            html:items.join("")
        }).appendTo(".orders");
    },
    error: function(x,y,z) {
        console.log(x.responseText);
        console.log(y);
        console.log(z);
    }
});
}
/*
function orderAdminPanel(url) {
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
                    <button class="btn btn-info my-2 my-sm-0 collapsed" data-toggle="collapse" data-target="#collapse${value.user_id}" aria-expanded="true" aria-controls="collapseOne">
                    See Details
                    </button>
                </h5>
                </div>
                </div>
                </div>

                <div id="collapse${value.user_id}" class="collapse" aria-labelledby="heading${value.user_id}" data-parent="#accordion">
                <div class="card-body">
                <form onSubmit="if(!confirm('Are you sure you would like to do this?')){return false;}" method = "post" action = "">
                <div class = "row">
                    <div class = "col-lg-2">
                        <h5>User ID</h5>
                        <input class = "w-100" type = "text" id = "id{value.user_id}" name = "user_id" value = "${value.user_id}" readonly>
                    </div>
                    <div class = "col-lg-6">
                        <h5>Full Name</h5>
                        <input class = "w-100" type = "text" id = "name{value.user_id}" name = "name" value = "${value.first_name} ${value.last_name}">
                    </div>
                    <div class = "col-lg-4">
                        <h5>Contact</h5>
                        <p><a class = "btn btn-success w-100" href = "mailto:${value.email}">Send email</a></p>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-2">
                        <p>Email: </p>
                    </div>
                    <div class = "col-lg-6">
                        <input class = "w-100" type = "text" id = "mail{value.email}" name = "email" value = "${value.email}">
                    </div>
                    <div class = "col-lg-4">
                        <input class = "btn btn-danger w-100" type = "submit" name = "admin" value = "Make Admin">
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-2">
                        <p>Phone: </p>
                    </div>
                    <div class = "col-lg-6">
                        <input class = "w-100" type = "text" id = "phone{value.email}" name = "phone" value = "${value.phone_number}">
                    </div>
                    <div class = "col-lg-2">
                        <input class = "btn btn-success w-100" type = "submit" name = "update" value = "Update">
                    </div>
                    <div class = "col-lg-2">
                        <input class = "btn btn-alert w-100" type = "submit" name = "delete" value = "Delete">
                    </div>
                    </div>
                <div class = "row mt-1">
                <div class = "col-lg-12 text-center">
                    <h5>Shipping Info</h5>
                    </div>
                    </div>
                <div class = "row">
                        <div class = "col-lg-3">
                             <p>Address</p>
                             <input class = "w-100" type = "text" id = "add{value.user_id}" name = "sadd" value = "${value.street_address}">
                        </div>
                        <div class = "col-lg-3">
                        <p>City</p>
                             <input class = "w-100" type = "text" id = "city{value.user_id}" name = "scity" value = "${value.city}">
                        </div>
                        <div class = "col-lg-3">
                        <p>State</p>
                             <input class = "w-100" type = "text" id = "state{value.user_id}" name = "sstate" value = "${value.state}">
                        </div>
                        <div class = "col-lg-3">
                        <p>Zip</p>
                             <input class = "w-100" type = "text" id = "zip{value.user_id}" name = "szip" value = "${value.zip}">
                        </div>
                </div>
                <div class = "row mt-1">
                <div class = "col-lg-12 text-center">
                    <h5>Billing Info</h5>
                    </div>
                    </div>
                <div class = "row">
                        <div class = "col-lg-3">
                             <p>Address</p>
                             <input class = "w-100" type = "text" id = "add{value.user_id}" name = "badd" value = "${value.street_address}">
                        </div>
                        <div class = "col-lg-3">
                        <p>City</p>
                             <input class = "w-100" type = "text" id = "city{value.user_id}" name = "bcity" value = "${value.city}">
                        </div>
                        <div class = "col-lg-3">
                        <p>State</p>
                             <input class = "w-100" type = "text" id = "state{value.user_id}" name = "bstate" value = "${value.state}">
                        </div>
                        <div class = "col-lg-3">
                        <p>Zip</p>
                             <input class = "w-100" type = "text" id = "zip{value.user_id}" name = "bzip" value = "${value.zip}">
                        </div>
                </div>
                </div>
                </div>
            </form>
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
}*/

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
                    <button class="btn btn-info my-2 my-sm-0 collapsed" data-toggle="collapse" data-target="#collapse${value.user_id}" aria-expanded="true" aria-controls="collapseOne">
                    See Details
                    </button>
                </h5>
                </div>
                </div>
                </div>

                <div id="collapse${value.user_id}" class="collapse" aria-labelledby="heading${value.user_id}" data-parent="#accordion">
                <div class="card-body">
                <form onSubmit="if(!confirm('Are you sure you would like to do this?')){return false;}" method = "post" action = "">
                <div class = "row">
                    <div class = "col-lg-2">
                        <h5>User ID</h5>
                        <input class = "w-100" type = "text" id = "id{value.user_id}" name = "user_id" value = "${value.user_id}" readonly>
                    </div>
                    <div class = "col-lg-6">
                        <h5>Full Name</h5>
                        <input class = "w-100" type = "text" id = "name{value.user_id}" name = "name" value = "${value.first_name} ${value.last_name}">
                    </div>
                    <div class = "col-lg-4">
                        <h5>Contact</h5>
                        <p><a class = "btn btn-success w-100" href = "mailto:${value.email}">Send email</a></p>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-2">
                        <p>Email: </p>
                    </div>
                    <div class = "col-lg-6">
                        <input class = "w-100" type = "text" id = "mail{value.email}" name = "email" value = "${value.email}">
                    </div>
                    <div class = "col-lg-4">
                        <input class = "btn btn-danger w-100" type = "submit" name = "admin" value = "Make Admin">
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-lg-2">
                        <p>Phone: </p>
                    </div>
                    <div class = "col-lg-6">
                        <input class = "w-100" type = "text" id = "phone{value.email}" name = "phone" value = "${value.phone_number}">
                    </div>
                    <div class = "col-lg-2">
                        <input class = "btn btn-success w-100" type = "submit" name = "update" value = "Update">
                    </div>
                    <div class = "col-lg-2">
                        <input class = "btn btn-alert w-100" type = "submit" name = "delete" value = "Delete">
                    </div>
                    </div>
                <div class = "row mt-1">
                <div class = "col-lg-12 text-center">
                    <h5>Shipping Info</h5>
                    </div>
                    </div>
                <div class = "row">
                        <div class = "col-lg-3">
                             <p>Address</p>
                             <input class = "w-100" type = "text" id = "add{value.user_id}" name = "sadd" value = "${value.street_address}">
                        </div>
                        <div class = "col-lg-3">
                        <p>City</p>
                             <input class = "w-100" type = "text" id = "city{value.user_id}" name = "scity" value = "${value.city}">
                        </div>
                        <div class = "col-lg-3">
                        <p>State</p>
                             <input class = "w-100" type = "text" id = "state{value.user_id}" name = "sstate" value = "${value.state}">
                        </div>
                        <div class = "col-lg-3">
                        <p>Zip</p>
                             <input class = "w-100" type = "text" id = "zip{value.user_id}" name = "szip" value = "${value.zip}">
                        </div>
                </div>
                <div class = "row mt-1">
                <div class = "col-lg-12 text-center">
                    <h5>Billing Info</h5>
                    </div>
                    </div>
                <div class = "row">
                        <div class = "col-lg-3">
                             <p>Address</p>
                             <input class = "w-100" type = "text" id = "add{value.user_id}" name = "badd" value = "${value.street_address}">
                        </div>
                        <div class = "col-lg-3">
                        <p>City</p>
                             <input class = "w-100" type = "text" id = "city{value.user_id}" name = "bcity" value = "${value.city}">
                        </div>
                        <div class = "col-lg-3">
                        <p>State</p>
                             <input class = "w-100" type = "text" id = "state{value.user_id}" name = "bstate" value = "${value.state}">
                        </div>
                        <div class = "col-lg-3">
                        <p>Zip</p>
                             <input class = "w-100" type = "text" id = "zip{value.user_id}" name = "bzip" value = "${value.zip}">
                        </div>
                </div>
                </div>
                </div>
            </form>
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
