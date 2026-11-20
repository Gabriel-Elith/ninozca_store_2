create database sistema_ventas_ninozca;
use sistema_ventas_ninozca; 

-- Tablas principales 

-- Tabla cliente: Almacenara los datos personales 

create table clientes ( 
id_cliente INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(45) NOT NULL,
apellidos VARCHAR(45) NOT NULL,
direccion VARCHAR(45) NOT NULL,
ciudad VARCHAR(45) NOT NULL,
identificacion VARCHAR(45) NOT NULL UNIQUE,
correo VARCHAR(45) NOT NULL UNIQUE,
numero VARCHAR(45),
fecha_eliminacion DATETIME DEFAULT NULL
);

-- Tabla usuarios: almacena la informacion para el acceso al sistema 

create table usuarios ( 
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(45) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL 
);

-- Tabla administradores: encargado o encargados de la gestion interna del sistema 

create table administradores ( 
id_admin INT AUTO_INCREMENT PRIMARY KEY,
contrasena VARCHAR(255) NOT NULL
);

-- Tabla productos: articulos disponibles para la venta 

create table productos ( 
id_producto INT AUTO_INCREMENT PRIMARY KEY,
precio DECIMAL(10,2) NOT NULL,
talla VARCHAR(45),
descripcion VARCHAR(45) NOT NULL
);

-- Tablas intermedias 

-- Tabla cliente_usuario: rompemos la dependencia directa cliente-usuario que teniamos en la entrega anterior 

create table cliente_usuario (
id_cliente_usuario INT AUTO_INCREMENT PRIMARY KEY,
id_cliente INT NOT NULL,
id_usuario INT NOT NULL,
fecha_asociacion DATETIME DEFAULT CURRENT_TIMESTAMP,
estado VARCHAR(45) DEFAULT 'Activo',
FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON DELETE CASCADE,
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

-- Tabla inventario: control del stock por producto 

create table inventario ( 
 id_inventario INT AUTO_INCREMENT PRIMARY KEY,
 id_producto INT NOT NULL UNIQUE, 
 stock INT NOT NULL DEFAULT 0,
 FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE CASCADE
);

-- Tablas de flujo de compra 

create table carro_compras ( 
 id_carro INT AUTO_INCREMENT PRIMARY KEY,
 id_cliente INT NOT NULL,
 fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
 compra DECIMAL(10,2) DEFAULT 0.00,
 FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON DELETE CASCADE
);

-- Tabla nueva datalle del carro (intermedia entre carro y prodcuto) 

create table detalle_carro ( 
id_detalle_carro INT AUTO_INCREMENT PRIMARY KEY,
id_carro INT NOT NULL,
id_producto INT NOT NULL,
cantidad INT NOT NULL DEFAULT 1,
FOREIGN KEY (id_carro) REFERENCES carro_compras(id_carro) ON DELETE CASCADE,
FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE CASCADE
);

-- Tabla pedidos: registra como va la orden del cliente 

create table pedidos ( 
id_pedido INT AUTO_INCREMENT PRIMARY KEY,
id_cliente INT NOT NULL,
total_compra DECIMAL(10,2) NOT NULL,
estatus VARCHAR(45) NOT NULL DEFAULT 'Pendiente',
fecha_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON DELETE RESTRICT
);

-- Tabla nueva: detalles del pedido intermedia entre pedidos y productos 

create table detalle_pedido ( 
id_detalle_pedido INT AUTO_INCREMENT PRIMARY KEY,
id_pedido INT NOT NULL,
id_producto INT NOT NULL,
cantidad INT NOT NULL,
precio_unitario_venta DECIMAL(10,2) NOT NULL, -- Congela el precio al momento de comprar
FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE CASCADE,
FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE RESTRICT
);

-- Tabla ventas (anteriormente era Reporte de ventas): se manejara el historial de transacciones 

create table ventas ( 
id_venta INT AUTO_INCREMENT PRIMARY KEY,
id_pedido INT NOT NULL UNIQUE, -- Se asocia directo al pedido aprobado
id_admin INT NOT NULL, -- El administrador que procesa o valida la venta
total_venta DECIMAL(10,2) NOT NULL,
fecha_venta DATETIME DEFAULT CURRENT_TIMESTAMP,
metodo_pago VARCHAR(45) NOT NULL,
estado_venta VARCHAR(45) NOT NULL DEFAULT 'Completada',
FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE RESTRICT,
FOREIGN KEY (id_admin) REFERENCES administradores(id_admin) ON DELETE RESTRICT
);

select * from sistema_ventas_ninozca.cliente_usuario