<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .card {
            width: fit-content;;
            margin-bottom: 20px;
        }
        .btn-reserve {
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
  <h2>MCP Realtime</h2>
  <p>Welcome to MCP </p>
  
  
  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
            <button class="btn btn-primary btn-reserve" onclick="reserveSpot('A01')">A01</button>
            <button type="button" class="btn btn-primary btn-reserve" onclick="reserveSpot('A02')">A02</button>
          <button class="btn btn-primary btn-reserve" id="park_id">A03</button>
          <buttton class="btn btn-primary btn-reserve" id="park_id">A04</buttton>
          <buttton class="btn btn-primary btn-reserve" id="park_id">A05</buttton>
          <buttton class="btn btn-primary btn-reserve">A06</buttton>
          <buttton class="btn btn-primary btn-reserve">A07</buttton>
          <buttton class="btn btn-primary btn-reserve">A08</buttton>
          <buttton class="btn btn-primary btn-reserve">A09</buttton>
          <buttton class="btn btn-primary btn-reserve">A10</buttton>
          <buttton class="btn btn-primary btn-reserve">A11</buttton>
          <buttton class="btn btn-primary btn-reserve">A12</buttton>
          <buttton class="btn btn-primary btn-reserve">A13</buttton>
          <buttton class="btn btn-primary btn-reserve">A14</buttton>

        </div>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body d-flex justify-content-start flex-column">
          <buttton class="btn btn-primary btn-reserve">B01</button>
          <buttton class="btn btn-primary btn-reserve">B02</buttton>
          <buttton class="btn btn-primary btn-reserve">B03</buttton>
          <buttton class="btn btn-primary btn-reserve">B04</buttton>
          <buttton class="btn btn-primary btn-reserve">B05</buttton>
          <buttton class="btn btn-primary btn-reserve">B06</buttton>
          <buttton class="btn btn-primary btn-reserve">B07</buttton>
          <buttton class="btn btn-primary btn-reserve">B08</buttton>
          <buttton class="btn btn-primary btn-reserve">B09</buttton>
          <buttton class="btn btn-primary btn-reserve">B10</buttton>
          <buttton class="btn btn-primary btn-reserve">B11</buttton>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="row row-cols-3">
<div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body d-flex justify-content-start flex-column">
        <buttton class="btn btn-primary btn-reserve">C01</button>
          <buttton class="btn btn-primary btn-reserve">C02</buttton>
          <buttton class="btn btn-primary btn-reserve">C03</buttton>
          <buttton class="btn btn-primary btn-reserve">C04</buttton>
          <buttton class="btn btn-primary btn-reserve">C05</buttton>
          <buttton class="btn btn-primary btn-reserve">C06</buttton>
          <buttton class="btn btn-primary btn-reserve">C07</buttton>
          <buttton class="btn btn-primary btn-reserve">C08</buttton>
          <buttton class="btn btn-primary btn-reserve">C09</buttton>
          <buttton class="btn btn-primary btn-reserve">C10</buttton>
          <buttton class="btn btn-primary btn-reserve">C11</buttton>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body d-flex justify-content-start flex-column">
        <buttton class="btn btn-primary btn-reserve">D01</button>
          <buttton class="btn btn-primary btn-reserve">D02</buttton>
          <buttton class="btn btn-primary btn-reserve">D03</buttton>
          <buttton class="btn btn-primary btn-reserve">D04</buttton>
          <buttton class="btn btn-primary btn-reserve">D05</buttton>
          <buttton class="btn btn-primary btn-reserve">D06</buttton>
          <buttton class="btn btn-primary btn-reserve">D07</buttton>
          <buttton class="btn btn-primary btn-reserve">D08</buttton>
          <buttton class="btn btn-primary btn-reserve">D09</buttton>
          <buttton class="btn btn-primary btn-reserve">D10</buttton>
          <buttton class="btn btn-primary btn-reserve">D11</buttton>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body d-flex justify-content-start flex-column">
          <buttton class="btn btn-primary btn-reserve">E01</button>
          <buttton class="btn btn-primary btn-reserve">E02</buttton>
          <buttton class="btn btn-primary btn-reserve">E03</buttton>
          <buttton class="btn btn-primary btn-reserve">E04</buttton>
          <buttton class="btn btn-primary btn-reserve">E05</buttton>
          <buttton class="btn btn-primary btn-reserve">E06</buttton>
          <buttton class="btn btn-primary btn-reserve">E07</buttton>
          <buttton class="btn btn-primary btn-reserve">E08</buttton>
          <buttton class="btn btn-primary btn-reserve">E09</buttton>
          <buttton class="btn btn-primary btn-reserve">E10</buttton>
          <buttton class="btn btn-primary btn-reserve">E11</buttton>
          <buttton class="btn btn-primary btn-reserve">E12</buttton>
          <buttton class="btn btn-primary btn-reserve">E13</buttton>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

<script>
    function reserveSpot(parkingSpot) {
        var status = 1; // สมมติให้สถานะเป็น Reserved ตามที่กำหนด
        var timeIn = new Date().toLocaleString(); // สมมติให้เวลาเป็นปัจจุบัน

        var park_data = {
            "parkingSpot": parkingSpot,
            "status": status,
            "timeIn": timeIn,
        };
        console.log(park_data)
        // ทำการส่งข้อมูลผ่าน Ajax
        $.ajax({
            url: "http://localhost/api_project/update.php", 
            type: "POST", // ใช้เมธอด POST เนื่องจากต้องการส่งข้อมูล
            dataType: 'json',
            data: JSON.stringify(park_data),// ข้อมูลที่จะส่งไปยังเซิร์ฟเวอร์
            success: function(response) {
                console.log("Data sent successfully!"); // แสดงข้อความใน console เมื่อสำเร็จ
                // กระทำเพิ่มเติมหลังจากการส่งข้อมูล (ถ้ามี)
            },
            error: function(xhr, status, error) {
                console.error("Error:", error); // แสดงข้อผิดพลาดใน console หากเกิดข้อผิดพลาด
            }
        });
    }

</script>