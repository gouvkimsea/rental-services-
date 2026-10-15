<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Saira+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Odibee+Sans&family=Saira+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
    <style>
      
      body{
        background-color: rgb(0, 0, 0);
      }
      .vehicle-type {
        position: absolute;
        top: 16px;
        left: 16px;
        background-color: #22d380;
        color: white;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        
        
      }
      .vehicle-name{
         font-family: 'Saira Semi Condensed';
      }
       .card {
        width: 300px;
        background-color: #ffffff;
        border-radius: 24px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        border: 1px solid #e0e0e0;
      }
     
      .card-container{
        display: flex;
        
        margin-left:  100px;
        gap: 15px;
        flex-direction: row;
        flex-wrap: wrap;

      } 
       .card-top {
        background-color: #ffffff; /* Light off-white background */
        height: 220px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
      }
     
     .card-body {
        padding: 24px;
        flex-grow: 5; 
        background-color:#f5f5f5;

       
      }
      .card-footer{
        padding: 10px;
        display: flex;
        justify-content: space-between; 
        align-items: center;
      }
     
    
    .price-box {
      font-size: 14px;
      color: #777777;
    }

    .price {
      font-size: 26px;
      font-weight: 700;
      color: #111111;
    }

    .book-btn {
      background-color: #00BFFF; /* Vibrant orange */
      color: white;
      border: none;
      padding: 12px 32px;
      border-radius: 25px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    .book-btn:hover {
      background-color: #d44d1a;
    }
       

  

  

    
       
    </style>
</head>
<body>
  <nav style="display: flex; justify-content: space-between; align-items: center; padding: 20px 30px; flex-wrap: wrap; gap: 15px;">
    <div style="display: flex; align-items: center; gap: 20px;">
      <a href="Service.php" style="color: #00BFFF; text-decoration: none; font-weight: bold; font-size: 18px;">&larr; Back to Home</a>
      <h1 style="font-family: 'Odibee Sans'; font-size: 60px; margin: 0; color:#00BFFF;">City Car</h1>
    </div>
    <div style="display: flex; align-items: center; gap: 12px;">
      <a href="Service.php" class="btn btn-outline-info">All Services</a>
      <a href="dashboard.php" class="btn btn-outline-light">Dashboard</a>
      <a href="login.php" class="btn btn-primary">Account</a>
    </div>
  </nav>
  <p style="margin-left: 30px; margin-bottom: 20px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: aliceblue;">Our company has many various brands of city cars providing high quality and affordable rental options.</p>
      <div class="card-container">

        <div class="card">
          <div class="card-top">
          <img src="https://png.pngtree.com/png-clipart/20250520/original/pngtree-a-realistic-blue-nissan-x-trail-parked-on-simple-background-png-image_21037343.png"
          width="150px" 
          height="150px" >
          </div>
          <div class="card-body">
            <div class="vehicle-type">City Car</div>
            <h2 class="vehicle-name">Nisan</h2>
          </div>
          
          <div class="card-footer">
            <div class="price-box">
            <span class="price">$55</span> / day
            </div><button class="book-btn">Book Now</button>
          </div>
        </div>
        <div class="card">
          <div class="card-top">
          <img src="https://ford.co.mz/en/wp-content/uploads/2024/04/Ranger_Wildtrak_Lucid_Red-1024x359.png"
          width="250px" 
          height="100px" >
          </div>
          <div class="card-body">
            <div class="vehicle-type">City Car</div>
            <h2 class="vehicle-name">Ford Ranger</h2>
          </div>
          
          <div class="card-footer">
            <div class="price-box">
            <span class="price">$70</span> / day
            </div><button class="book-btn">Book Now</button>
            </div>
          </div>
          <div class="card">
          <div class="card-top">
          <img src="https://pngimg.com/uploads/mazda/mazda_PNG40.png"
          width="200px" 
          height="100px" >
          </div>
          <div class="card-body">
            <div class="vehicle-type">City Car</div>
            <h2 class="vehicle-name">Mazda</h2>
          </div>
          
          <div class="card-footer">
            <div class="price-box">
            <span class="price">$60</span> / day
            </div><button class="book-btn">Book Now</button>
            </div>
          </div>

          <div class="card">
          <div class="card-top">
          <img src="https://purepng.com/public/uploads/large/purepng.com-chevrolet-camaro-rs-blue-carcarvehicletransportchevroletchevy-961524646535qcoex.png"
          width="200px" 
          height="100px" >
          </div>
          <div class="card-body">
            <div class="vehicle-type">City Car</div>
            <h2 class="vehicle-name">Chevrolet Camaro</h2>
          </div>
          
          <div class="card-footer">
            <div class="price-box">
            <span class="price">$89</span> / day
            </div><button class="book-btn">Book Now</button>
            </div>
          </div>

          <div class="card">
          <div class="card-top">
          <img src="https://www.toyota.com.kh/content/dam/cambodia/models/sedan/vios/my22/exterior/360-red-mm.png"
          width="300px" 
          height="150px" >
          </div>
          <div class="card-body">
            <div class="vehicle-type">City Car</div>
            <h2 class="vehicle-name">Toyota Vios</h2>
          </div>
          
          <div class="card-footer">
            <div class="price-box">
            <span class="price">$8</span> / day
            </div><button class="book-btn">Book Now</button>
            </div>
          </div>

          <div class="card">
          <div class="card-top">
          <img src="https://www.suzuki.co.nz/images/assets/573673/23"
          width="200px" 
          height="150px" >
          </div>
          <div class="card-body">
            <div class="vehicle-type">City Car</div>
            <h2 class="vehicle-name">Suzuki Jimny</h2>
          </div>
          
          <div class="card-footer">
            <div class="price-box">
            <span class="price">$8</span> / day
            </div><button class="book-btn">Book Now</button>
            </div>
          </div>

                    <div class="card">
          <div class="card-top">
          <img src="https://www.suzuki.co.nz/images/assets/573673/23"
          width="200px" 
          height="150px" >
          </div>
          <div class="card-body">
            <div class="vehicle-type">City Car</div>
            <h2 class="vehicle-name">Suzuki Jimny</h2>
          </div>
          
          <div class="card-footer">
            <div class="price-box">
            <span class="price">$8</span> / day
            </div><button class="book-btn">Book Now</button>
            </div>
          </div>

                    <div class="card">
          <div class="card-top">
          <img src="https://www.suzuki.co.nz/images/assets/573673/23"
          width="200px" 
          height="150px" >
          </div>
          <div class="card-body">
            <div class="vehicle-type">City Car</div>
            <h2 class="vehicle-name">Suzuki Jimny</h2>
          </div>
          
          <div class="card-footer">
            <div class="price-box">
            <span class="price">$8</span> / day
            </div><button class="book-btn">Book Now</button>
            </div>
          </div>
          
          




        </div>
    
   

    
    
</body>
</html>