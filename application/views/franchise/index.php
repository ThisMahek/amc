<div class="wrapper3">
    <div class="row" ?> 
        <div class="col-md-3 col-sm-6">
            <div class="counter">
                <div class="counter-icon">
                    <i class="fa fa-inr" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $franchise_data->total_fees ?></span>
                <h3>Franchise Fees</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter red">
                <div class="counter-icon">
                    <i class="fa fa-inr" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $franchise_data->fees_paid ?></span>
                <h3>Franchise Paid</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter">
                <div class="counter-icon">
                    <i class="fa fa-inr" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $franchise_data->balance ?></span>
                <h3>Franchise Amount</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h3 class="text-center">Welcome, <?php echo $franchise_data->franchise_name ?> </h3>
                
                
                
            </div>
        </div>
    </div>
</div>
</div>