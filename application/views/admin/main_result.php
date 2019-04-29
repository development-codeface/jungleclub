

  <div class="card-body bg-light">	<?php $s=0;  foreach($result as $frqs){ $s=$s+$frqs['am'];
$month = date('m', strtotime($frqs['bookingenddate']));

  
                        	 } ?>  









							 <div class="row">
							
                                    <div class="col-6">
                                       
 <h3> </h3>
                                        <h5 class="font-light m-t-0">Report for this month</h5></div>
                                    <div class="col-6 align-self-center display-6 text-right">
                                        <h2 class="text-success fonz"><i class="fa fa-inr"></i> <?php echo $s;?></h2></div>
                                </div>
							
                            </div>
                            <div class="table-responsive " style="height: 510px; position: relative;" >
                                <table class="table table-hover no-wrap table-striped " >
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>NAME</th>
                                            <th>PACKAGE</th>
                                            <th>DATE</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                        <tbody >
									<?php $i=1; foreach($result as $frq){  ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td class="txt-oflo"><?php echo $frq['fr'].' '.$frq['lr'];?></td>
                                            <td><span class="badge badge-success badge-pill"><?php echo $frq['package'] ;?></span> </td>
                                            <td class="txt-oflo"><?php echo date("m/d/Y", strtotime($frq['bookingenddate']));?></td>
                                            <td><span class="text-success fonz"><i class="fa fa-inr"></i><?php echo $frq['am'];?></span></td>
                                        </tr>
                                  <?php $i++; } ?>
                                      
                                    </tbody>
                                </table>
                            </div>