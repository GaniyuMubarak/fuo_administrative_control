
<!-- Registered student query -->

<!-- SELECT DISTINCT student_payment.id, academic_studentinfo.new_appID, application_studentinfo.surname, application_studentinfo.othername, student_payment.paid_amount, student_payment.payment_type, student_payment.session, student_payment.date_time FROM student_payment INNER JOIN academic_studentinfo ON student_payment.matric=academic_studentinfo.new_appID
INNER JOIN application_studentinfo ON application_studentinfo.applicationID=academic_studentinfo.applicationID WHERE student_payment.session="2022/2023" AND student_payment.paystack_return!="0" ORDER BY student_payment.session DESC -->