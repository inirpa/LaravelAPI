<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
					Input user Details
				</div>
				<div class="panel-body">
					<form action="saveUser" method="post">
						Name <input type="text" name="userName" class="form-control" required>
						Email <input type="email" name="userEmail" class="form-control" required>
						Type <select class="form-control" name="userType" required>
								<option>Admin</option>
								<option>Normal</option>
							</select>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<button class="btn btn-success" type="submit">
								Save
							</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>