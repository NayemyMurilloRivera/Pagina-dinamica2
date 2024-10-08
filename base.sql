CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    ocupacion VARCHAR(100),
    fecha_nacimiento DATE,
    email VARCHAR(100),
    telefono VARCHAR(15),
    linkedin VARCHAR(100),
    nacionalidad VARCHAR(100),
    ubicacion VARCHAR(100),
    ingles VARCHAR(50),
    español VARCHAR(50),
    frances VARCHAR(50),
    perfil TEXT,
    formacion TEXT,
    experiencia TEXT,
    foto BLOB
);

CREATE TABLE habilidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100)
);

CREATE TABLE lenguajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100)
);

CREATE TABLE intereses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100)
);

CREATE TABLE usuario_habilidad (
    usuario_id INT,
    habilidad_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (habilidad_id) REFERENCES habilidades(id)
);

CREATE TABLE usuario_lenguaje (
    usuario_id INT,
    lenguaje_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (lenguaje_id) REFERENCES lenguajes(id)
);

CREATE TABLE usuario_interes (
    usuario_id INT,
    interes_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (interes_id) REFERENCES intereses(id)
);
