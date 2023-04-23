HasOne:
    {
        Patient => Death
        Department => Employee
        Room => BloodBank , Clinic
    }
HasMany:
    {
        Patient => Diagnosed , PatientAnalysi , PatientAppointment , PatientsOperation , PatientSymptom
        Department => Clinic
        Certification => CertificationEmployee
        Disease => Diagnosed
        EquipmentType => Equipment
        Medicine = > MedicineBill , PatientMedicine
        Room => RoomContent , WorkSchedule
        Symptom => PatientSymptom
        Operation => PatientsOperation
        Employee => CertificationEmployee , Diagnosed , WorkSchedule , PatientsOperation
        Equipment => EquipmentBill , RoomContent
        PatientAppointment => Diagnosed
    }
belongsTo:
    {
        Patient => User
        Employee => User , Department
        BloodBank => Room
        CertificationEmployee => Employee , Certification
        Clinic => Department , Room
        Death => patient
        Diagnosed => Employee , Patient , Disease , PatientMedicine
        Equipment => EquipmentTypes
        EquipmentBill => Employee , Equipment
        MedicineBill => Medicine , Employee
        PatientAnalysi => Patient , Analysi
        PatientAppointment => Patient , Clinic
        PatientMedicine => Medicine , Diagnosed
        PatientsOperation => Patient , Employee , Operation
        PatientSymptom => Patient , Symptom
        RoomContent => Equipment , Room
        WorkSchedule => Employee , Room
    }
