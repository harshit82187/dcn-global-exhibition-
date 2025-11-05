<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>New Query Us Submission</title>
	</head>
	<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border: 1px solid #e0e0e0;">
			<tr>
				<td style="background-color: #000000; padding: 20px; text-align: center;">
					<img src="{{ $logo }}" alt="DCN Global Logo" style="max-width: 200px; height: auto;">
				</td>
			</tr>
			<tr>
				<td style="text-align: center; padding: 20px 20px 10px 20px;">
					<h2 style="color: #333333; margin: 0;">Get A Quote Submission</h2>
				</td>
			</tr>
			<!-- Contact Details -->
            <tr>
				<td style="padding: 10px 20px; color: #555555;">
					<strong>Type:</strong> {{ $query['type'] ?? 'N/A' }}
				</td>
			</tr>
              <tr>
				<td style="padding: 10px 20px; color: #555555;">
					<strong>City Name:</strong> {{ $query['city'] ?? 'N/A' }}
				</td>
			</tr>             
            <tr>
				<td style="padding: 10px 20px; color: #555555;">
					<strong>Event Name:</strong> {{ $query['event_name'] ?? 'N/A' }}
				</td>
			</tr>
            <tr>
				<td style="padding: 10px 20px; color: #555555;">
					<strong>Event Date:</strong> {{ $query['event_date'] ?? 'N/A' }}
				</td>
			</tr>
            <tr>
				<td style="padding: 10px 20px; color: #555555;">
					<strong>Stand Size (In MM):</strong> {{ $query['stand_size'] ?? 'N/A' }}
				</td>
			</tr>
			<tr>
				<td style="padding: 10px 20px; color: #555555;">
					<strong>Name:</strong> {{ $query['name'] ?? 'N/A' }}
				</td>
			</tr>
			<tr>
				<td style="padding: 10px 20px; color: #555555;">
					<strong>Email:</strong> {{ $query['email'] ?? 'N/A' }}
				</td>
			</tr>
			<tr>
				<td style="padding: 10px 20px; color: #555555;">
					<strong>Mobile No:</strong> {{ $query['mobile_no'] ?? 'N/A' }}
				</td>
			</tr>
		
			<!-- Message -->
			<tr>
				<td style="padding: 10px 20px 20px 20px; color: #555555;">
					<strong>Message:</strong><br>
					<div style="margin-top: 5px; white-space: pre-line;"> {{ $query['comment'] ?? 'N/A' }}</div>
				</td>
			</tr>
			<!-- Footer -->
			<tr>
				<td style="text-align: center; padding: 20px; color: #999999; font-size: 12px;">
					{{ date('Y') }} © All Rights Reserved <i class="fa fa-heart heart text-danger"></i> By <a href="{{ url('/') }}" target="_blank" style="color:#f84e1d  !important;" >DCN Global Exhibition</a> And Powered By <a href="{{ url('https://www.pearlorganisation.com/') }}" target="_blank" style="color:#f84e1d  !important;">Pearl Organisation</a>
				</td>
			</tr>
		</table>
	</body>
</html>