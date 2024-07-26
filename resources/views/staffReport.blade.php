<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Report</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif; /* Use UB's official font if available */
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Light gray background */
        }
        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Header Styles */
        .header {
            background-color: #7e317b; /* Light purple */
            color: #ffd700; /* Gold */
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .header img {
            max-width: 150px; /* Adjust based on actual logo size */
            position: absolute;
            top: 10px;
            left: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .header h3 {
            margin: 0;
            font-size: 20px;
        }
        /* Content Styles */
        .content {
            background-color: #ffffff; /* White background for content */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .content h2 {
            color: #7e317b; /* Light purple */
            font-size: 22px;
            border-bottom: 2px solid #7e317b;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .content p {
            margin: 10px 0;
        }
        .content p strong {
            color: #333333; /* Dark gray */
        }
        .section {
            margin-bottom: 20px;
        }
        /* Footer Styles */
        .footer {
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section  -->
        <div class="header">
            <h1>Report Type Goes Here</h1>
            <h3>Report ID: {{ $report->_id }}</h3>
        </div>

        <!-- Content Section -->
        <div class="content">

            <b>Deadline: </b> {{ $report->deadline }}
            </br>
            <b>Mission Statement: </b> {{ $report->missionStatement }}
        </div>
    </div>
</body>
</html> 
