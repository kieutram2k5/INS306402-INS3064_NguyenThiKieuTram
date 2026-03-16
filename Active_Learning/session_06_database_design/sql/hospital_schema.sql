CREATE TABLE patients (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100),
  date_of_birth DATE
);

CREATE TABLE doctors (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100),
  specialization VARCHAR(100)
);

CREATE TABLE appointments (
  id INT PRIMARY KEY AUTO_INCREMENT,
  patient_id INT,
  doctor_id INT,
  appointment_date DATETIME,
  FOREIGN KEY (patient_id) REFERENCES patients(id),
  FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);

CREATE TABLE prescriptions (
  id INT PRIMARY KEY AUTO_INCREMENT,
  appointment_id INT,
  notes TEXT,
  FOREIGN KEY (appointment_id) REFERENCES appointments(id)
);

CREATE TABLE medicines (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100)
);

CREATE TABLE prescription_medicines (
  id INT PRIMARY KEY AUTO_INCREMENT,
  prescription_id INT NOT NULL,
  medicine_id INT NOT NULL,
  dosage VARCHAR(80),
  frequency VARCHAR(80),
  FOREIGN KEY (prescription_id) REFERENCES prescriptions(id) ON DELETE CASCADE,
  FOREIGN KEY (medicine_id) REFERENCES medicines(id),
  UNIQUE (prescription_id, medicine_id)
);