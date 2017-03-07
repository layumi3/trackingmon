<div class="col-lg-6">
	<div class="panel panel-primary">
						<div class="panel-heading">Form Driver</div>
                		<div class="panel-body">                		

                        <form role="form" method="post" action="<?php echo ('updateDriver');?>">
                            <div class="form-group">
                                <label>Nama Pengemudi</label>
                                <input class="form-control" name="nama_driver" value="<?php echo $row_data->nama_driver ?>" placeholder="Enter text">
                            </div>
                            <div class="form-group">
                                <label>No SIM</label>
                                <input class="form-control" name="no_sim" value="<?php echo $row_data->no_sim ?>" placeholder="Enter text">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat" value="<?php echo $row_data->alamat ?>" placeholder="Enter text">
                            </div>
                            <div class="form-group">
                                <label>Handphone</label>
                                <input class="form-control" name="handphone" value="<?php echo $row_data->handphone ?>" placeholder="Enter text">
                            </div>

                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>
                    	</div>
    </div>
</div>