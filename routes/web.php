<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','IndexController@index');

//Ruta administrador
Route::match(['get', 'post'], '/admin','AdminController@login');

Route::match(['get', 'post'], '/seller','SellerController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Productos Filtros Ruta
Route::match(['get', 'post'],'/products-filter', 'ProductsController@filter');

// Página de categoría / listado
Route::get('/products/{url}','ProductsController@products');

// Página de detalles del producto
Route::get('/product/{id}','ProductsController@product');

// Página de carrito
Route::match(['get', 'post'],'/cart','ProductsController@cart');

// Añadir al carrito Ruta
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');

// Eliminar producto de la ruta del carrito
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

// Actualizar cantidad de producto del carrito
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

// Obtenga el precio del atributo del producto
Route::any('/get-product-price','ProductsController@getProductPrice');

//Valida si esta en stock
Route::any('/get-value-stock','ProductsController@getvalueStocks');

// Aplicar cupón
Route::post('/cart/apply-coupon','ProductsController@applyCoupon');

// Página de inicio de sesión
Route::get('/login-register','UsersController@userLoginRegister');

//Registrar Usuarios
Route::get('/register-users', 'UsersController@userRegister');

//Recuperar contraseña
Route::match(['get','post'],'forgot-password','UsersController@forgotPassword');

//Politicas de privacidad
Route::get('policiesPrivacity','UsersController@policies');

// Formulario de registro de usuarios Enviar
Route::post('/user-register','UsersController@register');

// Confirmar cuenta
Route::get('confirm/{code}','UsersController@confirmAccount');

// Formulario de inicio de sesión de los usuarios
Route::post('user-login','UsersController@login');

// Cierre de sesión de usuarios
Route::get('/user-logout','UsersController@logout');

// Buscar Productos
Route::post('/search-products','ProductsController@searchProducts');

//Compruebe si el usuario ya existe
Route::match(['GET','POST'],'/check-email','UsersController@checkEmail');

// Comprobar código PIN
Route::post('/check-pincode','ProductsController@checkPincode');

// Verifique el correo electrónico del usuario
Route::post('/check-subscriber-email','NewsletterController@checkSubscriber');

// Agregar correo electrónico del usuario
Route::post('/add-subscriber-email','NewsletterController@addSubscriber');

// Todas las rutas después de iniciar sesión
Route::group(['middleware'=>['frontlogin']],function(){
	// Página de cuenta de usuarios
	Route::match(['get','post'],'account','UsersController@account');
	//Comprobar la contraseña actual del usuario
	Route::post('/check-user-pwd','UsersController@chkUserPassword');
	// Actualizar contraseña
	Route::post('/update-user-pwd','UsersController@updatePassword');
	// Página de pago
	Route::match(['get','post'],'checkout','ProductsController@checkout');

	// Página de revisión de pedidos
	Route::match(['get','post'],'/order-review','ProductsController@orderReview');
	// Realizar pedido
	Route::match(['get','post'],'/place-order','ProductsController@placeOrder');
	// Página de agradecimiento
	Route::get('/thanks','ProductsController@thanks');
	// Pagina de Paypal
	Route::get('/paypal','ProductsController@paypal');
	// Página de pedidos de usuarios
	Route::get('/orders','ProductsController@userOrders');
	// Página de productos solicitados por el usuario
	Route::get('/orders/{id}','ProductsController@userOrderDetails');
	// Página de agradecimiento de Paypal
	Route::get('/paypal/thanks','ProductsController@thanksPaypal');
	// Paypal Cancel Page
	Route::get('/paypal/cancel','ProductsController@cancelPaypal');
	// Wish List Page
	Route::match(['get','post'],'wish-list','ProductsController@wishList');
	// Delete Product from Wish List
	Route::get('/wish-list/delete-product/{id}','ProductsController@deleteWishlistProduct');

	// Payumoney Routes
	Route::get('payumoney','PayumoneyController@payumoneyPayment');
});
	Route::post('/payumoney/response','PayumoneyController@payumoneyResponse');
	Route::get('/payumoney/thanks','PayumoneyController@payumoneyThanks');
	Route::get('/payumoney/fail','PayumoneyController@payumoneyFail');
	Route::get('/payumoney/verification/{id}','PayumoneyController@payumoneyVerification');
	Route::get('/payumoney/verify','PayumoneyController@payumoneyVerify');

	// Paypal IPN
	Route::post('/paypal/ipn','ProductsController@ipnPaypal');

Route::group(['middleware' => ['adminlogin']], function () {
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get', 'post'],'/admin/update-pwd','AdminController@updatePassword');

	// Categorías de administración Rutas
	Route::match(['get', 'post'], '/admin/add-category','CategoryController@addCategory');
	Route::match(['get', 'post'], '/admin/edit-category/{id}','CategoryController@editCategory');
	Route::get( '/admin/delete-category/{id}','CategoryController@deleteCategory');
	Route::get('/admin/view-categories','CategoryController@viewCategories');

	// Rutas de productos de administración
	Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
	Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
	Route::get('/admin/view-products','ProductsController@viewProducts');
	Route::get('/admin/export-products','ProductsController@exportProducts');
	Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
	Route::get('/admin/delete-product-video/{id}','ProductsController@deleteProductVideo');

	Route::match(['get', 'post'], '/admin/add-images/{id}','ProductsController@addImages');
	Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteProductAltImage');

	// Admi rutas para atributos
	Route::match(['get', 'post'], '/admin/add-attributes/{id}','ProductsController@addAttributes');
	Route::match(['get', 'post'], '/admin/edit-attributes/{id}','ProductsController@editAttributes');
	Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');

	// Rutas de cupones de administrador
	Route::match(['get','post'],'/admin/add-coupon','CouponsController@addCoupon');
	Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');
	Route::get('/admin/view-coupons','CouponsController@viewCoupons');
	Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon');


//RUTA DE ORDENES
//Ruta Ver Ordenes
Route::get('/admin/orders','ProductsController@viewOrders');
//Ruta Ver Detalles De Ordenes
Route::get('/admin/order-detail/{id}', 'ProductsController@viewOrderDetails');
//Ruta Actualizar Estado De La Orden
Route::post('/admin/update-order-status','ProductsController@updateOrderStatus');

//RUTA PARA CIUDADES
//Ruta Ver Ciudades
Route::match(['get','post'],'/admin/cities','CityController@viewCities');
//Ruta Agregar Ciudad
Route::match(['get','post'],'/admin/add-city','CityController@addCity');
//Ruta Editar Ciudades
Route::match(['get','post'],'/admin/edit-city/{id}','CityController@editCity');
//Ruta Eliminar Ciudades
Route::match(['get','post'],'/admin/delete-city/{id}','CityController@deleteCity');


	// Rutas de banners de administrador
	Route::match(['get','post'],'/admin/add-banner','BannersController@addBanner');
	Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner');
	Route::get('admin/view-banners','BannersController@viewBanners');
	Route::get('/admin/delete-banner/{id}','BannersController@deleteBanner');

	// Rutas de pedidos de administrador
	Route::get('/admin/view-orders','ProductsController@viewOrders');

	// Ruta de gráficos de órdenes de administrador
	Route::get('/admin/view-orders-charts','ProductsController@viewOrdersCharts');

	// Ruta de detalles de pedido de administrador
	Route::get('/admin/view-order/{id}','ProductsController@viewOrderDetails');

	// Factura de pedido
	Route::get('/admin/view-order-invoice/{id}/{tipo?}','ProductsController@viewOrderInvoice');

	//Factura PDF
	Route::get('/admin/view-pdf-invoice/{id}','ProductsController@viewPDFInvoice');

	// Actualizar estado del pedido
	Route::post('/admin/update-order-status','ProductsController@updateOrderStatus');

	// Ruta de usuarios administradores
	Route::get('/admin/view-users','UsersController@viewUsers');

	// Ruta de gráficos de usuarios administradores
	Route::get('/admin/view-users-charts','UsersController@viewUsersCharts');

	// Admin Usuarios Países Gráficos Ruta
	Route::get('/admin/view-users-countries-charts','UsersController@viewUsersCountriesCharts');

	//Exportar ruta de usuarios
	Route::get('/admin/export-users','UsersController@exportUsers');

	// Admin / Subadministradores Ver ruta
	Route::get('/admin/view-admins','AdminController@viewAdmins');

	// Agregar ruta de administradores / subadministradores
	Route::match(['get','post'],'/admin/add-admin','AdminController@addAdmin');

	// Editar ruta de administradores / subadministradores
	Route::match(['get','post'],'/admin/edit-admin/{id}','AdminController@editAdmin');

	// Agregar ruta CMS
	Route::match(['get','post'],'/admin/add-cms-page','CmsController@addCmsPage');

	// Editar ruta CMS
	Route::match(['get','post'],'/admin/edit-cms-page/{id}','CmsController@editCmsPage');

	// Ver ruta de páginas CMS
	Route::get('/admin/view-cms-pages','CmsController@viewCmsPages');

	// Delete CMS Route
	Route::get('/admin/delete-cms-page/{id}','CmsController@deleteCmsPage');

	// Get Enquiries
	Route::get('/admin/get-enquiries','CmsController@getEnquiries');

	// View Enquiries
	Route::get('/admin/view-enquiries','CmsController@viewEnquiries');

	// Currencies Routes
	// Add Currency Route
	Route::match(['get','post'],'/admin/add-currency','CurrencyController@addCurrency');

	// Edit Currency Route
	Route::match(['get','post'],'/admin/edit-currency/{id}','CurrencyController@editCurrency');

	// Delete Currency Route
	Route::get('/admin/delete-currency/{id}','CurrencyController@deleteCurrency');

	// View Currencies Route
	Route::get('/admin/view-currencies','CurrencyController@viewCurrencies');

	// View Shipping Charges
	Route::get('/admin/view-shipping','ShippingController@viewShipping');

	// Update Shipping Charges
	Route::match(['get','post'],'/admin/edit-shipping/{id}','ShippingController@editShipping');

	// View Newsletter Subscribers
	Route::get('admin/view-newsletter-subscribers','NewsletterController@viewNewsletterSubscribers');

	// Update Newsletter Status
	Route::get('admin/update-newsletter-status/{id}/{status}','NewsletterController@updateNewsletterStatus');

	// Delete Newsletter Email
	Route::get('admin/delete-newsletter-email/{id}','NewsletterController@deleteNewsletterEmail');

	// Export Newsletter Emails
	Route::get('/admin/export-newsletter-emails','NewsletterController@exportNewsletterEmails');
});


Route::get('/logout','AdminController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Mostrar página de contacto
Route::match(['get','post'],'/page/contact','CmsController@contact');

// Mostrar página de publicación (para Vue.js)
Route::match(['get','post'],'/page/post','CmsController@addPost');

// Mostrar página CMS
Route::match(['get','post'],'/page/{url}','CmsController@cmsPage');

// Actualizar estado usuario en administador
Route::match(['get','post'],'/admin/update-status-users/{id}','UsersController@statusUsers');


//Rutas para vendedor
Route::group(['prefix' => 'seller' ], function(){

	Route::get('/dash', 'SellerController@dashboard');

	Route::get('/dash/product', 'SellerController@products');

	Route::get('/dash/order/viewClient','SellerController@viewClient');

	Route::get('/dash/order/viewOrdersProduc/{id}','OrderController@viewOrdersProduc');

	Route::get('dash/addresses/showEnvio/{id}','Delivery_addressesController@showEnvio');

	Route::resource('/dash/users/','ClientesController');

	Route::resource('/dash/order','OrderController');

	Route::resource('dash/addresses','Delivery_addressesController');

	Route::resource('/register','SellerController');
});
