FROM openjdk:11-jdk

RUN cd /
RUN apt-get install git -y
RUN git clone https://github.com/willitscale/DroidCartServer.git
RUN chmod +x /DroidCartServer/gradlew

WORKDIR /DroidCartServer