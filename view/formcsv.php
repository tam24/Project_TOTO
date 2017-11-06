<div class="container">
	<div class="row">
		<div class="col-md-2 col-sm-2 col-xs-0"></div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="page-header">
		  			<h1>Upload file <small>PDF File</small></h1>
				</div>
					<!--to send a file POST + enctype -->
				<form actions="" method="post" enctype="multipart/form-data">
					<fieldset>
					<input type="hidden" name="submitFile" value="1" />
					<label for="fileForm">File</label>
					<input type="file" name="fileForm" id="fileForm" /> <!--this will appear as an index in an array of files -->
					<p class="help-block">Not all extensions are allowed</p>
					<br />
					<input type="submit" class="btn btn-success btn-block" value="Upload" />
					</fieldset>
				</form>

       <!-- Second form to retrieve CSV file  -->
				<form actions="" method="get" enctype="multipart/form-data">
						<h1>Generate a CSV file</h1>
					<br />
					<input type="submit" class="btn btn-success btn-block" value="Create CSV" />
					</fieldset>
				</form>

			</div>
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
		</div>

	</div>

</div>
