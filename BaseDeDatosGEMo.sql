-- 1. Tabla de Usuarios
-- tipo_usuario: 0 = Administrador, 1 = Cliente
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE, -- Usado para login en lugar de username
    password VARCHAR(255) NOT NULL, -- En producción, usar hash (ej. bcrypt)
    tipo_usuario INT NOT NULL CHECK (tipo_usuario IN (0, 1)),
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabla de Historial (Reportes/Entradas)
CREATE TABLE historial_emocional (
    entry_id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    nivel_emocion INT NOT NULL CHECK (nivel_emocion BETWEEN 1 AND 10),
    nombre_emocion VARCHAR(50) NOT NULL,
    habito_asociado VARCHAR(50),
    fecha DATE NOT NULL,
    timestamp_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- 3. Tabla de Consejos (Feedback del Admin al Cliente)
CREATE TABLE consejos (
    consejo_id INT PRIMARY KEY AUTO_INCREMENT,
    admin_id INT NOT NULL,
    cliente_id INT NOT NULL,
    mensaje TEXT NOT NULL,
    leido BOOLEAN DEFAULT FALSE,
    fecha_envio DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES usuarios(id),
    FOREIGN KEY (cliente_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- DATOS DE EJEMPLO (DUMMY DATA) --

-- Insertar un Administrador (Pass: 123)
-- El ID se autogenerará, asumimos ID=1
INSERT INTO usuarios (email, password, tipo_usuario) 
VALUES ('admin@gemo.com', '123', 0);

-- Insertar Clientes (Pass: 123)
-- Asumimos ID=2 y ID=3
INSERT INTO usuarios (email, password, tipo_usuario) 
VALUES ('cliente1@mail.com', '123', 1),
       ('cliente2@mail.com', '123', 1);

-- Insertar Historial de ejemplo para cliente 1 (ID=2)
INSERT INTO historial_emocional (usuario_id, nivel_emocion, nombre_emocion, habito_asociado, fecha)
VALUES (2, 8, 'Estrés', 'Trabajo', CURDATE());