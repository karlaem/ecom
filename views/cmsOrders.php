<div class="mylist">
    <div class="list">
        <h2>Your purchase</h2>
        <?php
        //from ordersproductsdetails
        if(isset($this->oOrders)){
            foreach ($this->oOrders as $order){
            ?>
            <div class="item clients">
            <table>
            <tr>
                <th>Order Id</th>
                <th>Name</th>                
                <th>Quantity</th>
                <th>price</th>
                <th>Cart</th>
                <th>Total</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <tr>
                <td><?=$order->orderId?></td>
                <td><?=$order->strName?></td>                
                <td><?=$order->quantity?></td>
                <td><?=$order->price?></td>
                <td><?=$order->total?></td>
                <td><?=$order->totalAmount?></td>
                <td><?=$order->date?></td>
                <td><?=$order->inventoryproductsname?></td>
            </tr>

            </table>
            </div>
            <?php
            }
        }else{
            echo "<div><p>You dont have any purchases</p></div>";
        }
        ?>
    </div>
</div>
