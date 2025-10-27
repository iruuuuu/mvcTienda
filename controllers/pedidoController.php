<?php 

if (count($products) > 0): ?>
    <?php foreach ($products as $product): ?>
        <div style="border: 1px solid #6c6c6cff; padding: 10px; margin: 10px 0;">
            <h3><?php echo htmlspecialchars($product->getName()); ?></h3>
            <p><strong>Descripción:</strong> <?php echo htmlspecialchars($product->getDescription()); ?></p>
            <!-- Agrega aquí cualquier otra información relevante del producto -->
            <p><strong>Stock:</strong> <?php echo htmlspecialchars($product->getStock()); ?></p>
            <?php 
            if (isset($_SESSION['user']) && is_object($_SESSION['user'])):
                echo '<a href="index.php?c=products&productId=' . htmlspecialchars($product->getId()) . '">Añadir a pedidos</a>';
                if ($_SESSION['user']->isAdmin()):
            ?>
                    <a href="index.php?delete=<?php echo $product->getId(); ?>" 
                        onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                        [Eliminar Producto]
                    </a>
            <?php 
                endif;
            endif; 
            ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No hay productos aún.</p>
<?php endif; ?>