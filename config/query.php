All SQL QUERY USED IN THE PROJECT:

1) SELECT username FROM staff;
2) INSERT INTO staff(username,phoneNumber,officeAddress,workExperience,email,password, ip)
  VALUES('$username','$phone','$address','$work','$email','$password','$sip');

3) SELECT * FROM admin
              WHERE aid='$id';
4) SELECT uid,username,email,password,pincode,city,locality,address,timeofsignup,mobile FROM user;

5) SELECT sid,username,email,password,phoneNumber,officeAddress,workExperience FROM staff;

6) SELECT sid from staff;

7) SELECT complaintnumber,type,zone,title,description,timeofpublish,username,status,statusid FROM complaint
   INNER JOIN user ON user.uid=complaint.uid;

8) SELECT sid,username from staff;

9) SELECT complaintnumber,username,p_assigned,remark,expected_date FROM complaint_dept
   INNER JOIN complaint ON complaint_dept.cid=complaint.cid
   INNER JOIN staff ON staff.sid=complaint_dept.sid;

10) SELECT cid,uid,type FROM complaint
    WHERE complaintnumber='$cno';

11) INSERT INTO complaint_dept(sid,uid,cid,aid,expected_date,p_assigned,remark,ip)
    VALUES('$name','$uid','$cid','$id','$deadline','$type','$remark','$sip');

12) INSERT INTO rating(cid,sid) VALUES('$cid','$name');

13) UPDATE complaint SET statusId='1'
    WHERE complaintnumber='$cno';

14) SELECT * FROM user WHERE username = '$u' AND password = '$p';

15) DELETE FROM user WHERE uid='$id';

16) SELECT * FROM user
    WHERE uid='$id';

17) SELECT type,zone,title,description,timeofpublish,status,cid FROM complaint
    ORDER BY timeofpublish DESC;

18) UPDATE rating
    SET rating_staff='$take'
    WHERE rating.cid='$id';

19) SELECT complaintnumber,type,status,timeofpublish,username FROM complaint
    INNER JOIN user ON complaint.uid=user.uid
    WHERE complaint.status=0";

20) SELECT type,zone,title,description,timeofpublish,status FROM complaint
    INNER JOIN user ON user.uid=complaint.uid
    WHERE user.pincode like '%$i%' OR
          user.locality like '%$i%' OR
          complaint.timeofpublish like '%$i%' OR 
          complaint.complaintnumber like '%$i%'
    ORDER BY timeofpublish DESC;

21) SELECT complaint.cid,expected_date,p_assigned,status,remark,timeofaction,username,memberRating FROM complaint_dept
       INNER JOIN staff ON complaint_dept.sid=staff.sid
       INNER JOIN complaint ON complaint.uid= complaint_dept.uid
       WHERE status=1 OR status=2;

22) SELECT complaintnumber,type,status,rating_staff FROM complaint
    INNER JOIN rating ON complaint.cid=rating.cid
    WHERE sid='$id';

23) SELECT username,timeofpublish,type,status FROM user
    INNER JOIN complaint ON user.uid=complaint.uid
    WHERE user.uid='$id';

24) UPDATE `staff`
    SET `username`='$username',
         `email`='$email',
         `password`='$password',
         `phoneNumber`='$phone',
         `officeAddress`='$address',
         `workExperience`='$work'
        WHERE staff.sid='$id';

25) UPDATE complaint
    SET status='$status'
    WHERE complaintnumber='$cno';

26) SELECT * FROM staff WHERE staff.sid='$index';
