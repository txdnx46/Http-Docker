version: '3.9' -> version docker ที่เลือกใช้ 

services:
  new:                                                                                   -> name cotainer 
    build: .                                                                             -> กำหนดให้บริการ Docker สร้างจาก Dockerfile ใน Dockerfile ปัจจุบัน 
    volumes:                                                                             -> กำหนด ที่อยู่ localhost หน้าเเรกของ project
      - ./src:/var/www/html  
    ports:                                                                               -> ใช่ port เป็น 9000 ให้เเมพไปยัง 80 บน container 
      - 9000:80

  mysql_db: -> cotainer database name
    image: mysql:latest                                                                  -> กำหนดให้เป็น image Mysql ตัวล่าสุด
    command: --default-authentication-plugin=mysql_native_password                       ->ตั้งค่า การประมวลตำสั่ง mysql เป็นการยืนยันตัวเอง 
    restart: always                                                                      -> ตั้งค่า ให้ Mysql  ทำงานอัตโนมัติ ขณะปิด coltainer 
    environment:                                                                         -> กำหนด server Mysql ยืนยันตัวตนด้วย รหัสผ่าน toot 
      MYSQL_ROOT_PASSWORD: root
      

  phpmyadmin:                                                                            -> บริการ phpmyadmin
    image: phpmyadmin:latest                                                             -> ใช้บริการ ล่าสุด 
    ports:          
      - 9001:80                                                                          -> แม็พ Port 9001 บน 80 
    environment:                                
      - PMA_ARBITRARY=1                                                                  ->  อนุญาติให้เชื่อมต่อ กับ Mysql อัตโนมัติ
      
      
