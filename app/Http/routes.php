<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/







/*
 * Start Admin Panel Routes list Admin Panel Routes list Admin Panel Routes list Admin Panel list
 */

/*
 * General Route list
 */

//front-end route-list
Route::get('/',[
    'uses'=>'Frontend\EcommerceController@index',
    'as'=>'welcome'
]);

Route::post('/',[
    'uses'=>'Frontend\EcommerceController@contact_us_save',
    'as'=>'contact.us.save'
]);

Route::get('/customer-login',[
    'uses'=>'Frontend\LoginController@customer_login',
    'as'=>'customer.login'
]);

Route::get('/customer-registration',[
    'uses'=>'Frontend\LoginController@customer_registration',
    'as'=>'customer.registration'
]);

Route::post('/customer-registration-check',[
    'uses'=>'Frontend\LoginController@customer_registration_check',
    'as'=>'customer.registration.check'
]);

Route::post('/customer-login-check',[
    'uses'=>'Frontend\LoginController@customer_login_check',
    'as'=>'customer.login.check'
]);

Route::get('/product-detail/{id}',[
    'uses' => 'Frontend\EcommerceController@product_detail',
    'as' => 'ecommerce.product.detail'
]);

Route::get('/contact-us',[
    'uses' => 'Frontend\EcommerceController@contact_us',
    'as' => 'contact.us'
]);
Route::get('/about-us',[
    'uses' => 'Frontend\EcommerceController@about_us',
    'as' => 'about.us'
]);
Route::get('/shipping-information',[
    'uses' => 'Frontend\EcommerceController@shipping_information',
    'as' => 'shipping.information'
]);
Route::get('/404',[
    'uses' => 'Frontend\EcommerceController@page_404',
    'as' => '404'
]);



Route::post('/add-to-cart',[
    'uses' => 'Frontend\CartController@add_to_cart',
    'as' => 'add.to.cart'
]);

Route::get('/show-cart',[
    'uses' => 'Frontend\CartController@show_cart',
    'as' => 'show.cart'
]);

Route::post('/cart-quantity-update',[
    'uses' => 'Frontend\CartController@cart_quantity_update',
    'as' => 'cart.quantity.update'
]);

Route::get('/cart-item-remove/{id}',[
    'uses' => 'Frontend\CartController@cart_remove',
    'as' => 'remove.cart.item'
]);

Route::get('/checkout-user',[
    'uses' => 'Frontend\CartController@checkout_user',
    'as' => 'checkout.user'
]);

Route::get('/billing-info',[
    'uses' => 'Frontend\CartController@checkout_billing_info',
    'as' => 'checkout.billinginfo'
]);
Route::get('/shipping-info',[
    'uses' => 'Frontend\CartController@checkout_shipping_info',
    'as' => 'checkout.shippinginfo'
]);

Route::post('/check-email',[
    'uses' => 'Frontend\CartController@check_email',
    'as' => 'email.check'
]);
Route::post('/billing-save',[
    'uses' => 'Frontend\CartController@billinginfo_save',
    'as' => 'billinginfo.save'
]);
Route::post('/shipping-save',[
    'uses' => 'Frontend\CartController@shippinginfo_save',
    'as' => 'shippinginfo.save'
]);

Route::post('/customer-check',[
    'uses' => 'Frontend\EcommerceController@check_customer',
    'as' => 'customer.check'
]);

Route::get('/payment-method',[
    'uses'=>'Frontend\CartController@payment_method',
    'as' =>'payment.method'
]);
Route::post('/save-order',[
    'uses'=>'Frontend\CartController@save_order',
    'as' =>'order.save'
]);

//shopping route list

Route::get('/shop-box',[
    'uses'=>'Frontend\ShopController@shop_home',
    'as' =>'shop.box.view'
]);
Route::get('/shop-list',[
    'uses'=>'Frontend\ShopController@shop_list',
    'as' =>'shop.list.view'
]);

//filter on shopping page

Route::post('/sort-by',[
    'uses' => 'Frontend\FilterController@short_by_filter',
    'as' => 'short.by.filter'
]);
Route::post('/sort-by-items',[
    'uses' => 'Frontend\FilterController@short_by_items',
    'as' => 'short.by.items'
]);

Route::post('/sort-by-price',[
    'uses' => 'Frontend\FilterController@short_by_price',
    'as' => 'shop.price.slider'
]);

Route::get('/category-wise-product/{id}',[
    'uses'=>'Frontend\FilterController@category_wise_product',
    'as' =>'category.wise.product'
]);

Route::post('/sort-by-pricewithcategory',[
    'uses' => 'Frontend\FilterController@short_by_price_with_category',
    'as' => 'shop.pricewithcategory.slider'
]);

Route::post('/search-product',[
    'uses' => 'Frontend\FilterController@search_product',
    'as' => 'search.product'
]);

Route::post('/pagination-product',[
    'uses' => 'Frontend\FilterController@pagination_product',
    'as' => 'pagination.product'
]);

Route::get('/occasion-wise-product/{id}',[
    'uses'=>'Frontend\FilterController@occasion_wise_product',
    'as' =>'occasion.wise.product'
]);


//for test



//end filter on shopping page

//start wishlist route

Route::get('/wishlist-product/{id}',[
    'uses'=>'Frontend\WishlistController@save_product_to_wishlist',
    'as' =>'save.product.wishlist'
]);

Route::get('/my-wishlist',[
    'uses'=>'Frontend\WishlistController@show_wishlist',
    'as' =>'show.wishlist'
]);
Route::get('/remove-wishlist/{id}',[
    'uses'=>'Frontend\WishlistController@remove_wishlist',
    'as' =>'remove.wishlist'
]);


//end wishlist route

//blog-product route-list

Route::get('/newest-product-list',[
    'uses'=>'Frontend\EcommerceController@newest_product_list',
    'as' =>'newest.product.list'   //blog products considered as newest product
]);
Route::get('/newest-product-detail/{id}',[
    'uses'=>'Frontend\EcommerceController@newest_product_details',
    'as' =>'newest.product.detail'   //blog products considered as newest product
]);
//end blog-product route-list

//customer dashboard route-list
Route::post('/province-by-country',[
    'uses'=>'Frontend\CustomerController@select_province_by_country',
    'as' =>'select.province.by.country'
]);
Route::post('/province-by-change-country',[
    'uses'=>'Frontend\CustomerController@select_provinces_on_change_country',
    'as' =>'select.provinces.on.change.country'
]);
Route::get('/customer-dashboard',[
    'uses'=>'Frontend\CustomerController@customer_dashboard',
    'as' =>'customer.dashboard'
]);
Route::get('/change-password',[
    'uses'=>'Frontend\CustomerController@change_password',
    'as' =>'change.password'
]);
Route::get('/customer-orders',[
    'uses'=>'Frontend\CustomerController@customer_orders',
    'as' =>'customer.orders'
]);
Route::get('/customer-billing-address',[
    'uses'=>'Frontend\CustomerController@customer_billing_address',
    'as' =>'customer.billing.address'
]);
Route::get('/customer-shipping-address',[
    'uses'=>'Frontend\CustomerController@customer_shipping_address',
    'as' =>'customer.shipping.address'
]);

Route::get('/customer-personal-info',[
    'uses'=>'Frontend\CustomerController@customer_personal_info',
    'as' =>'customer.personal.info'
]);


Route::put('/customer-personal-info-update',[
    'uses'=>'Frontend\CustomerController@customer_personal_info_update',
    'as' =>'customer.personal.info.update'
]);
Route::put('/customer-billing-info-update',[
    'uses'=>'Frontend\CustomerController@customer_billing_info_update',
    'as' =>'customer.billinginfo.update'
]);

Route::get('/provide-billing-info',[
    'uses'=>'Frontend\CustomerController@customer_provide_billing_info',
    'as' =>'customer.provide.billing.info'
]);
Route::get('/provide-shipping-info',[
    'uses'=>'Frontend\CustomerController@customer_provide_shipping_info',
    'as' =>'customer.provide.shipping.info'
]);

Route::post('/customer-billing-info-save',[
    'uses'=>'Frontend\CustomerController@customer_billing_info_save',
    'as' =>'customer.billinginfo.save'
]);
Route::post('/customer-shipping-info-save',[
    'uses'=>'Frontend\CustomerController@customer_shipping_info_save',
    'as' =>'customer.shippinginfo.save'
]);

Route::put('/customer-shipping-info-update',[
    'uses'=>'Frontend\CustomerController@customer_shipping_info_update',
    'as' =>'customer.shippinginfo.update'
]);

Route::get('/customer-notifications',[
    'uses'=>'Frontend\CustomerController@customer_notifications',
    'as' =>'customer.notifications'
]);
//end customer dashboard route-list



Route::get('/customer-logout',[
    'uses'=>'Frontend\CartController@customer_logout',
    'as' =>'customer.logout'
]);


//admin-section route list
Route::get('admin-login',[
    'uses'=>'Backend\AdminController@admin_login',
    'as'=>'admin.login'
]);
Route::post('/admin-login', 'Backend\AdminController@admin_login_check');
Route::get('/dashboard', 'Backend\SuperAdminController@index');
Route::get('/logout', [
    'uses'=>'Backend\SuperAdminController@logout',
    'as'=>'logout'
]);



/*
 * Admin panel Route list
 */

/*
 * Category Route list
 */
Route::get('/add-category', [
    'uses'=>'Backend\SuperAdminController@add_category',
    'as'=>'add.category'
]);
Route::post('/save-category', [
    'uses'=>'Backend\SuperAdminController@save_category',
    'as'=>'save.category'
]);
Route::get('/manage-category',[
    'uses'=>'Backend\SuperAdminController@manage_category',
    'as'=>'manage.category'
]);
Route::get('/publish-category/{id}', 'Backend\SuperAdminController@publish_category');
Route::get('/unpublish-category/{id}', 'Backend\SuperAdminController@unpublish_category');
Route::get('/edit-category/{id}', [
    'uses'=>'Backend\SuperAdminController@edit_category',
    'as'=>'edit.category'
]);
Route::put('/update-category', [
    'uses'=>'Backend\SuperAdminController@update_category',
    'as'=>'update.category'

]);

Route::get('/delete-category/{id}', 'Backend\SuperAdminController@delete_category');

/*
 * blog route list
 */
Route::get('add-blog', [
    'uses'=>'Backend\SuperAdminController@add_blog',
    'as'=>'add.blog'
]);
Route::post('save-blog', [
    'uses'=>'Backend\SuperAdminController@save_blog',
    'as'=>'save.blog'
]);
Route::get('manage-blog', [
    'uses'=>'Backend\SuperAdminController@manage_blog',
    'as'=>'manage.blog'
]);
Route::get('/publish-blog/{id}', 'Backend\SuperAdminController@publish_blog');
Route::get('/unpublish-blog/{id}', 'Backend\SuperAdminController@unpublish_blog');
Route::get('/edit-blog/{id}', 'Backend\SuperAdminController@edit_blog')->name('edit.blog');
Route::put('/update-blog', [
    'uses'=>'Backend\SuperAdminController@update_blog',
    'as'=>'update.blog'
]);
Route::get('/delete-blog/{id}', 'Backend\SuperAdminController@delete_blog');



/*
 * comments Route
 */
Route::get('manage-comment',[
    'uses'=>'Comment\CommentController@manage_comment',
    'as'=>'manage.comment'
]);
Route::get('show-comment/{id}',[
    'uses'=>'Comment\CommentController@show_comment',
    'as'=>'show.comment'
]);
Route::get('/publish-comment/{id}', 'Comment\CommentController@publish_comment');
Route::get('/unpublish-comment/{id}', 'Comment\CommentController@unpublish_comment');
Route::get('/delete-comment/{id}', 'Comment\CommentController@delete_comment');

/*
 * page route list
 */

Route::get('add-page', [
    'uses'=>'Backend\PageController@add_page',
    'as'=>'add.page'
]);
Route::post('save-page', [
    'uses'=>'Backend\PageController@save_page',
    'as'=>'save.page'
]);
Route::get('manage-page', [
    'uses'=>'Backend\PageController@manage_page',
    'as'=>'manage.page'
]);
Route::get('edit-page/{id}', [
    'uses'=>'Backend\PageController@edit_page',
    'as'=>'edit.page'
]);
Route::put('update-page', [
    'uses'=>'Backend\PageController@update_page',
    'as'=>'update.page'
]);
Route::get('/publish-page/{id}', 'Backend\PageController@publish_page');
Route::get('/unpublish-page/{id}', 'Backend\PageController@unpublish_page');
Route::get('/delete-page/{id}', 'Backend\PageController@delete_page');



/*
 * User route list
 */


Route::get('add-user', [
    'uses'=>'Backend\UserController@add_user',
    'as'=>'add.user'
]);
Route::post('save-user', [
    'uses'=>'Backend\UserController@save_user',
    'as'=>'save.user'
]);
Route::get('manage-user', [
    'uses'=>'Backend\CustomerController@manage_customer',
    'as'=>'manage.customer'
]);
Route::get('manage-customer', [
    'uses'=>'Backend\CustomerController@manage_customer',
    'as'=>'manage.customer'
]);


Route::get('show-customer/{id}', [
    'uses'=>'Backend\CustomerController@show_customer',
    'as'=>'show.customer'
]);

Route::get('delete-customer/{id}',[
    'uses'=>'Backend\CustomerController@delete_customer',
    'as'=>'delete.customer'
]);
Route::put('edit-user/{id}', [
    'uses'=>'Backend\UserController@edit_user',
    'as'=>'edit.user'
]);
Route::get('reply-user/{id}', [
    'uses'=>'Backend\UserController@reply_user',
    'as'=>'reply.user'
]);

Route::get('/publish-user/{id}', 'Backend\UserController@publish_user');
Route::get('/unpublish-user/{id}', 'Backend\UserController@unpublish_user');
Route::get('/delete-user/{id}', 'Backend\UserController@delete_user');


/*
 * Mail route
 */

Route::get('inbox-mail', [
    'uses'=>'Backend\MailController@manage_mail',
    'as'=>'manage.mail'
]);
Route::get('view-mail/{id}', [
    'uses'=>'Backend\MailController@show_mail',
    'as'=>'show.mail'
]);

Route::get('view-important-mail/{id}', [
    'uses'=>'Backend\MailController@show_important_mail',
    'as'=>'show.important.mail'
]);
Route::get('reply-mail/{id}', [
    'uses'=>'Backend\MailController@reply_mail',
    'as'=>'reply.mail'
]);
Route::get('reply-important-mail/{id}', [
    'uses'=>'Backend\MailController@reply_important_mail',
    'as'=>'reply.important.mail'
]);
Route::post('reply-mail', [
    'uses'=>'Backend\MailController@send_mail',
    'as'=>'send.mail'
]);
Route::post('reply-imporant-mail', [
    'uses'=>'Backend\MailController@send_important_mail',
    'as'=>'send.important.mail'
]);
Route::get('important-mail/{id}', [
    'uses'=>'Backend\MailController@important_mail',
    'as'=>'important.mail'
]);
Route::get('incoming-mail', [
    'uses'=>'Backend\MailController@incoming_mail',
    'as'=>'incoming.mail'
]);
Route::get('/delete-mail/{id}', 'Backend\MailController@delete_mail');




/*

 * End Admin Panel Routes
 */


/*
 * start Routes Ecommerce front-panel
 */

/*
 * End Routes Ecommerce front-panel
 */

/*
 * start Routes Ecommerce admin-panel
 */

// Category Route list
/*
Route::get('/ecommerce-add-category', [
    'uses'=>'Backend\EcommerceController@add_category',
    'as'=>'ecommerce.add.category'
]);

Route::post('/ecommerce-save-category', [
    'uses'=>'Backend\EcommerceController@save_category',
    'as'=>'ecommerce.save.category'
]);
Route::get('/ecommerce-manage-category',[
    'uses'=>'Backend\EcommerceController@manage_category',
    'as'=>'ecommerce.manage.category'
]);
Route::get('/ecommerce-publish-category/{id}', 'Backend\EcommerceController@publish_category');
Route::get('/ecommerce-unpublish-category/{id}', 'Backend\EcommerceController@unpublish_category');
Route::get('/ecommerce-edit-category/{id}', [
    'uses'=>'Backend\EcommerceController@edit_category',
    'as'=>'ecommerce.edit.category'
]);
Route::put('/ecommerce-update-category', [
    'uses'=>'Backend\EcommerceController@update_category',
    'as'=>'ecommerce.update.category'

]);

Route::get('/ecommerce-delete-category/{id}', 'Backend\EcommerceController@delete_category');


/*
 * blog route list
 */

Route::get('ecommerce-add-product', [
    'uses'=>'Backend\EcommerceController@add_product',
    'as'=>'ecommerce.add.product'
]);
Route::post('ecommerce-save-product', [
    'uses'=>'Backend\EcommerceController@save_product',
    'as'=>'ecommerce.save.product'
]);
Route::get('ecommerce-manage-product', [
    'uses'=>'Backend\EcommerceController@manage_product',
    'as'=>'ecommerce.manage.product'
]);
Route::get('/ecommerce-publish-product/{id}', 'Backend\EcommerceController@publish_product');
Route::get('/ecommerce-unpublish-product/{id}', 'Backend\EcommerceController@unpublish_product');
Route::get('/ecommerce-edit-product/{id}', 'Backend\EcommerceController@edit_blog')->name('ecommerce.edit.product');
Route::put('/ecommerce-update-product', [
    'uses'=>'Backend\SuperAdminController@update_product',
    'as'=>'ecommerce.update.product'
]);
Route::get('/ecommerce-delete-product/{id}', 'Backend\SuperAdminController@delete_product');



//category route-list



Route::get('/ecommerce-add-category', [
    'uses'=>'Backend\Ecommerce\EcommerceCategoryController@add_category',
    'as'=>'ecommerce.add.category'
]);
Route::post('/ecommerce-save-category', [
    'uses'=>'Backend\Ecommerce\EcommerceCategoryController@save_category',
    'as'=>'ecommerce.save.category'
]);

Route::get('/ecommerce-manage-category', [
    'uses'=>'Backend\Ecommerce\EcommerceCategoryController@manage_category',
    'as'=>'ecommerce.manage.category'
]);

Route::get('/ecommerce-edit-category/{id}', [
    'uses'=>'Backend\Ecommerce\EcommerceCategoryController@edit_category',
    'as'=>'ecategory.edit'
]);

Route::put('/ecommerce-update-category', [
    'uses'=>'Backend\Ecommerce\EcommerceCategoryController@update_category',
    'as'=>'ecommerce.update.category'
]);

Route::get('/ecommerce-publish-category/{id}',[
    'uses'=>'Backend\Ecommerce\EcommerceCategoryController@publish_category',
    'as'=>'ecommerce.publish.category'
]);
Route::get('/ecommerce-unpublish-category/{id}',[
    'uses'=>'Backend\Ecommerce\EcommerceCategoryController@unpublish_category',
    'as'=>'ecommerce.unpublish.category'
]);


Route::get('/ecommerce-delete-category/{id}',[
    'uses'=>'Backend\Ecommerce\EcommerceCategoryController@delete_category',
    'as'=>'ecommerce.delete.category'
]);


//product route-list


Route::get('/ecommerce-add-product', [
    'uses'=>'Backend\Ecommerce\EcommerceProductController@add_product',
    'as'=>'ecommerce.add.product'
]);
Route::post('/ecommerce-save-product', [
    'uses'=>'Backend\Ecommerce\EcommerceProductController@save_product',
    'as'=>'ecommerce.save.product'
]);
Route::get('/ecommerce-manage-product', [
    'uses'=>'Backend\Ecommerce\EcommerceProductController@manage_product',
    'as'=>'ecommerce.manage.product'
]);
Route::get('/ecommerce-edit-product/{id}', [
    'uses'=>'Backend\Ecommerce\EcommerceProductController@edit_product',
    'as'=>'ecommerce.edit.product'
]);

Route::put('/ecommerce-update-product', [
    'uses'=>'Backend\Ecommerce\EcommerceProductController@update_product',
    'as'=>'ecommerce.update.product'
]);

Route::get('/ecommerce-publish-product/{id}',[
    'uses'=>'Backend\Ecommerce\EcommerceProductController@publish_product',
    'as'=>'ecommerce.publish.product'
]);
Route::get('/ecommerce-unpublish-product/{id}',[
    'uses'=>'Backend\Ecommerce\EcommerceProductController@unpublish_product',
    'as'=>'ecommerce.unpublish.product'
]);




Route::get('/ecommerce-delete-product/{id}',[
    'uses'=>'Backend\Ecommerce\EcommerceProductController@delete_product',
    'as'=>'ecommerce.delete.product'
]);




/*
 * End Routes Ecommerce admin-panel
 */

