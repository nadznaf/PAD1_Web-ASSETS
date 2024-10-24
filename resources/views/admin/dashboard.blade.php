@extends('admin.layouts.appAdmin')

@section('title', "Dashboard Admin")

@section('content')
  <!--  Row 1 -->
  <div class="row">
    <div style="display:block;"></div>
        <div class="container">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <?php
                          // Periksa apakah user_id ada dalam session
                          if (isset($_SESSION['user_id'])) {
                              $user_id = $_SESSION['user_id'];
                              // Persiapkan statement SQL
                              if ($stmt = $conn->prepare("SELECT email FROM user WHERE user_id = ?")) {
                                // Binding parameter
                                $stmt->bind_param("i", $user_id);
                                // Eksekusi statement
                                if ($stmt->execute()) {
                                  // Ambil hasil dari kueri
                                  $getUserInfo = $stmt->get_result();
                                  // Ambil data pertama (karena hanya satu baris yang diharapkan)
                                if ($fetcharray = $getUserInfo->fetch_assoc()) {
                                    // Escape output untuk menghindari XSS
                                    $username = htmlspecialchars($fetcharray['email'], ENT_QUOTES, 'UTF-8');
                                ?>
                                <!-- Tampilkan username -->
                                <div class="typing-container">
                                  <h1 class="display-10 fw-bolder text-white mb-2" id="hello-text" style="font-size:40px; color:black!important; display: inline-block;
                                      overflow: hidden;">
                                      <strong>Hello </strong>
                                  </h1>
                                      <h1 class="display-10 fw-bolder text-white mb-2" id="typing-text" style="color: #0085db !important; font-size:40px;">
                                        <strong><?= $username; ?>!</strong>    
                                      </h1> 
                                  </div>
                                      <?php
                                  } else {
                                    // Handle case where no user with given user_id is found
                                    // echo "User tidak ditemukan.";
                                  }
                                } else {
                                  // Handle execution error
                                  // echo "Terjadi kesalahan saat mengeksekusi pernyataan SQL.";
                              }
                              // Tutup statement
                              $stmt->close();
                            } else {
                                // Handle preparation error
                                // echo "Terjadi kesalahan saat mempersiapkan pernyataan SQL.";
                            }
                        } else {
                            // Handle case where user_id is not set in session
                            // echo "User ID tidak ditemukan dalam session.";
                        }
                        ?>
                              <p class="lead fw-normal text-white-50 mb-4" style="color: #3E4756!important;">Welcome to our comprehensive inventory management system, designed to streamline and optimize your business operations. Our platform offers an intuitive interface and powerful features to help you manage products, suppliers, and inventory movements efficiently. Whether you're tracking incoming stock, managing supplier details, or monitoring product distribution, our system provides the tools you need for effective inventory control. Join us in transforming the way you handle inventory with ease and precision.</p>
                              </div>
                            </div>
                            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                              <img class="img-fluid rounded-3 my-5" src="welcome.jpg" alt="..." /></div>
                            </div>
                          </div>
                  </div>
                  <hr><br>
                  <div class="row">
                    <h1 class="h1"style="font-size:30px"><strong>Explanation of Each Table</strong></h1>
                    <div class="divider" style="margin-bottom:20px"></div>
                  <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="font-size:18px">
                          <strong>Explanation of Products Table</strong>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body" style="font-size:16px">
                          <strong>The Products table </strong>stores detailed information about all the items available in the inventory. Each entry in this table includes the product name, category, description, price, and stock. This table is crucial for managing the entire product catalog, ensuring that all product information is accurate and up-to-date.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" style="font-size:18px" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                          <strong>Explanation of Stock In Table</strong>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body" style="font-size:16px">
                          <strong>The Stock In table</strong>  records all incoming inventory items. Each entry in this table includes details such as the date of receipt, the quantity of items received, the specific products, and the supplying vendor. This table is vital for tracking inventory additions, ensuring that all incoming stock is logged accurately and inventory levels are kept up-to-date.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" style="font-size:18px" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                          <strong>Explanation of Stock Out Table</strong>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body" style="font-size:16px">
                        <strong>The Stock Out table</strong> tracks all outgoing inventory items. Each record includes information such as the date of dispatch, the quantity of items shipped, the specific products, and the purpose of the shipment. This table is essential for monitoring inventory reductions, helping to manage stock levels effectively and ensuring that all product outflows are documented properly.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" style="font-size:18px" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                          <strong>Explanation of Supplier Table</strong>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                        <div class="accordion-body" style="font-size:16px">
                        <strong>The Suppliers table </strong>contains essential information about the vendors and suppliers associated with the store. This includes supplier names, contact details, addresses, and other relevant information. This table helps in maintaining a comprehensive database of all suppliers, making it easy to manage supplier relationships and streamline procurement processes.
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          <br><hr><br>
          <div class="row">
            <h1 class="h1"><strong>Tutorial</strong></h1>
            <p class="fs-6">Follow these steps to effectively use our inventory management system:</p>
          </div>
          <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title fs-6"><strong>1. Upload Product Information</strong></h5>
                  <p class="card-text fs-4">On the Products Page, click the "Insert Data" button to upload information for all your products. This includes details such as product names, categories, descriptions, prices, and images. Ensuring all product information is accurately uploaded will help in efficient inventory tracking and management.</p>
                  <div class="d-grid gap-2 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a href="product.php" class="btn btn-primary">Upload your products</a> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title fs-6"><strong>2. Upload Supplier Information</strong></h5>
                  <p class="card-text fs-4">Navigate to the Suppliers Page and click the "Insert Data" button to upload information about all the suppliers who provide products to your store. Include essential details such as supplier names, contact information, and addresses. Maintaining a comprehensive supplier database is crucial for smooth procurement processes.</p>
                  <div class="d-grid gap-2 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a href="suppliers.php" class="btn btn-primary">Upload your suppliers</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title fs-6"><strong>3. Track Stock In and Stock Out</strong></h5>
                  <p class="card-text fs-4">Use the Stock In and Stock Out pages to monitor daily inventory movements. On the Stock In page, select products from a list of those uploaded on the Products Page and choose suppliers from the list uploaded on the Suppliers Page. Record incoming stock details such as receipt date and quantity. On the Stock Out page, select products from the list to log outgoing stock, noting the date, quantity, and destination. Accurate tracking of stock movements helps in maintaining optimal inventory levels.</p>
                  <div class="d-grid gap-2 d-sm-flex justify-content-sm-center justify-content-xl-start">
                  <a href="stockIn.php" class="btn btn-primary">Track your stock in</a>
                  <a href="stockOut.php" class="btn btn-primary">Track your stock out</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-titlefs-6"><strong>4. Export Data</strong></h5>
                  <p class="card-text fs-4">Once you have collected data, you can export it in your preferred format. On the Export Data page, choose to export data as PDF, CSV, Excel, print it directly, or copy it to the clipboard. You can also click the "Export" button on any data page to perform the export. This feature ensures you can easily share, analyze, and maintain records of your inventory data efficiently and effectively. By following these steps, you'll be able to efficiently manage your inventory, keep accurate records, and streamline your business operations. </p>
                  <div class="d-grid gap-2 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a href="exportProduct.php" class="btn btn-primary">Export your product data</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection