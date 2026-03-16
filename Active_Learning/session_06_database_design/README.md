# Session 06 – Database Design

## Part 1: Normalization

| Table Name | Primary Key | Foreign Key | Normal Form | Description |
| :--- | :--- | :--- | :--- | :--- |
| Students | student_id | None | 3NF | Stores student information |
| Professors | professor_id | None | 3NF | Stores professor information |
| Courses | course_id | professor_id | 3NF | Stores course information and assigned professor |
| Enrollments | (student_id, course_id) | student_id, course_id | 3NF | Stores student enrollments and grades |

### Identify Violations

**Redundant Columns**

The following columns cause redundancy in the original dataset:

- student_name  
- course_name  
- professor_name  
- professor_email  

These values repeat whenever a student enrolls in multiple courses.

---

**Update Anomalies**

1. Professor email change  
If a professor changes their email address, every row containing that professor must be updated.

2. Course rename  
If the name of a course changes, all rows referencing that course must be updated.

---

**Transitive Dependency**

course_id → professor_name  
professor_name → professor_email  

Therefore:

course_id → professor_email

This is a **transitive dependency**, which violates **Third Normal Form (3NF)**.

---

## Part 2: Relationships

- **Author → Book:** One-to-Many (1:N). A single author can write multiple books.
- **Citizen → Passport:** One-to-One (1:1). Each citizen has exactly one passport.
- **Customer → Order:** One-to-Many (1:N). A customer can place many orders.
- **Student → Class:** Many-to-Many (N:N). A student can take multiple classes and each class can contain many students.
- **Team → Player:** One-to-Many (1:N). One team can have many players.