<?php
$url = 'http://localhost/IVMS-API/API/tour/getSampleCompanyData.php';
$data = file_get_contents($url);
$tour_array = json_decode($data, true);


if (!isset($tour_array['message'])) {
  foreach ($tour_array['data']['tourData'] as $key => $item) {
    echo
      '<div class="tour-card" id="card1">
            <div class="tour-card-content">
              <h3 id="tour-name">' . $item['name'] . '</h3>
              <h4 id="tour-branch">' . $item['branch'] . '</h4>
              <h4 id="tour-place">' . $item['place'] . '</h4>
              <h5 id="tour-rate">' . $item['rate'] . '</h5>
            </div>
          </div>';
  }
}

// <div class="tour-card" id="card1">
//           <div class="tour-card-content">
//             <h3 id="tour-name">ABC Tour</h3>
//             <h4 id="tour-branch">Computer Science</h4>
//             <h4 id="tour-place">Mumbai</h4>
//             <h5 id="tour-rate">₹6000</h5>
//           </div>
