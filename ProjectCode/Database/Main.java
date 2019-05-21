import java.sql.*;

public class Main {

    public static void main(String[] args) {


        try {
            // get a connection
            Connection myConn = DriverManager.getConnection(
                    "jdbc:mariadb://dijkstra.ug.bcc.bilkent.edu.tr/atahan_mutlu", "atahan.mutlu",
                    "R67xFk3B");

            // create a statement
            Statement mystmt = myConn.createStatement();

            // drop tables if they already exist

            String sql = "";

            sql = "DROP TABLE IF EXISTS interviewer_interviewee";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS solves";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS coding_challenge_has";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS question";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS user_non_coding_question";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS editor_non_coding_question";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS user_coding_contest";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS editor_coding_contest";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS category_coding_challenges";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS editor_coding_challenges";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS interview_interview_coding_challenges";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS coding_contest_contest_coding_challenges";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS user_submission_survival_challenge";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS practice_coding_challenge_survival_challenge";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS interviewer_interviewee";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS editor";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS user";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS company_non_coding_question";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS category_non_coding_question";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS interview_coding_challenges";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS interview";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS contest_coding_challenges";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS submission";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS category";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS non_coding_question";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS company";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS coding_contest";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS member";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS survival_coding_challenge";

            mystmt.executeUpdate(sql);


            sql = "DROP TABLE IF EXISTS practice_coding_challenges";

            mystmt.executeUpdate(sql);

            sql = "DROP TABLE IF EXISTS coding_challenges";

            mystmt.executeUpdate(sql);

            //create tables

            sql = "CREATE TABLE member"
                    + "(username VARCHAR(20),"
                    + "password VARCHAR(40),"
                    + "name VARCHAR(40),"
                    + "user_type VARCHAR(7),"
                    + "email VARCHAR(20),"
                    + "country VARCHAR(20),"
                    + "zip_code VARCHAR(5),"
                    + "city VARCHAR(20),"
                    + "street VARCHAR(20),"
                    + "website VARCHAR(20),"
                    + "CHECK (user_type in (user,editor,company)),"
                    + "PRIMARY KEY (username)) ENGINE=innodb;";


            mystmt.executeUpdate(sql);

            System.out.println ("Created customer table");

            sql = "CREATE TABLE user"
                    + "(username VARCHAR(20),"
                    + "work_place VARCHAR(400),"
                    + "education VARCHAR(400),"
                    + "technical_skills VARCHAR(400),"
                    + "FOREIGN KEY (username) REFERENCES member (username),"
                    + "PRIMARY KEY (username)) ENGINE=innodb";


            mystmt.executeUpdate(sql);

            System.out.println ("Created user table");

            sql = "CREATE TABLE editor"
                    + "(username VARCHAR(20) PRIMARY KEY, "
                    + "FOREIGN KEY (username) REFERENCES member (username)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            System.out.println ("Created editor table");

            sql = "CREATE TABLE company"
                    + "(company_id int,"
                    + "username VARCHAR(20),"
                    + "phone_number CHAR(20),"
                    + "FOREIGN KEY (username) REFERENCES member (username),"
                    + "PRIMARY KEY (company_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE non_coding_question"
                    + "(question_id int NOT NULL AUTO_INCREMENT,"
                    + "question_name VARCHAR(200),"
                    + "question VARCHAR(1000) NOT NULL,"
                    + "PRIMARY KEY (question_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE coding_contest"
                    + "(contest_id int,"
                    + "leader_board VARCHAR(200),"
                    + "time DATETIME NOT NULL,"
                    + "PRIMARY KEY (contest_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE coding_challenges"
                    + "(challenge_id int NOT NULL AUTO_INCREMENT,"
                    + "challenge_name VARCHAR(200) NOT NULL,"
                    + "text VARCHAR(1000),"
                    + "difficulty VARCHAR(20),"
                    + "test_case CHAR(40),"
                    + "PRIMARY KEY (challenge_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE practice_coding_challenges"
                    + "(challenge_id int,"
                    + "FOREIGN KEY (challenge_id) REFERENCES coding_challenges (challenge_id),"
                    + "PRIMARY KEY (challenge_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE contest_coding_challenges"
                    + "(challenge_id int,"
                    + "FOREIGN KEY (challenge_id) REFERENCES coding_challenges (challenge_id),"
                    + "PRIMARY KEY (challenge_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE category"
                    + "(category_name VARCHAR(20),"
                    + "PRIMARY KEY (category_name)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE submission(" +
                    "sub_id int NOT NULL AUTO_INCREMENT," +
                    "text varchar(1000)," +
                    "score float NOT NULL," +
                    "PRIMARY KEY (sub_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE solves"
                    + "(challenge_id int,"
                    + "username varchar(20),"
                    + "sub_id int,"
                    + "FOREIGN KEY (challenge_id) references coding_challenges(challenge_id),"
                    + "FOREIGN KEY (username) references user(username),"
                    + "FOREIGN KEY (sub_id) references submission(sub_id),"
                    + "PRIMARY KEY (challenge_id, username, sub_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE survival_coding_challenge("+
                    " survival_id int PRIMARY KEY," +
                    //" challenges challenge,"+
                    " specifications int NOT NULL) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE question("+
                    " challenge_id int,"+
                    " question_no int NOT NULL,"+
                    " text varchar (800) NOT NULL,"+
                    " PRIMARY KEY (challenge_id,question_no),"+
                    " FOREIGN KEY (challenge_id) references coding_challenges (challenge_id)"+
                    ") ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE coding_challenge_has("+
                    "challenge_id int,"+
                    "question_no int"+
                    //"PRIMARY KEY (challenge_id, question_no),"+
                    //" FOREIGN KEY (challenge_id) references coding_challenges (challenge_id),"+
                    //"FOREIGN KEY question_no references question(question_no)"+
                    ") ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE interview("+
                    " interview_id int,"+
                    " company_id int,"+
                    " position varchar(30),"+
                    " duration date,"+
                    " specifications varchar(400),"+
                    " date date,"+
                    " PRIMARY KEY (interview_id)"+
                    ") ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE interview_coding_challenges"
                    + "(challenge_id int,"
                    + "interview_id int,"
                    + "FOREIGN KEY (challenge_id) REFERENCES coding_challenges (challenge_id),"
                    + "FOREIGN KEY (interview_id) REFERENCES interview (interview_id),"
                    + "PRIMARY KEY (interview_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);


            sql = "CREATE TABLE user_non_coding_question( "+
                    " username varchar(20), "+
                    " question_id int NOT NULL, "+
                    " text varchar (800) NOT NULL, "+
                    " rate int NOT NULL, "+
                    " PRIMARY KEY (username, question_id), "+
                    " FOREIGN KEY (username) references user (username), "+
                    " FOREIGN KEY (question_id) references non_coding_question (question_id)"+
                    ") ENGINE=innodb";

            mystmt.executeUpdate(sql);


            sql = "CREATE TABLE editor_non_coding_question( "+
                    " username varchar(20), "+
                    " question_id int NOT NULL AUTO_INCREMENT, "+
                    " PRIMARY KEY (username, question_id), "+
                    " FOREIGN KEY (username) references editor (username), "+
                    " FOREIGN KEY (question_id) references non_coding_question (question_id)"+
                    ") ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE company_non_coding_question(" +
                    "company_id int NOT NULL," +
                    "question_id int NOT NULL," +
                    "PRIMARY KEY (company_id, question_id)," +
                    "FOREIGN KEY (company_id) references company (company_id)," +
                    "FOREIGN KEY (question_id) references non_coding_question (question_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE category_non_coding_question(" +
                    "category_name varchar(20) NOT NULL," +
                    "question_id int NOT NULL AUTO_INCREMENT," +
                    "PRIMARY KEY (category_name, question_id)," +
                    "FOREIGN KEY (category_name) references category (category_name)," +
                    "FOREIGN KEY (question_id) references non_coding_question (question_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE user_coding_contest(" +
                    "username varchar(20)," +
                    "contest_id int NOT NULL," +
                    "PRIMARY KEY (username, contest_id)," +
                    "FOREIGN KEY (username) references user (username)," +
                    "FOREIGN KEY (contest_id ) references coding_contest(contest_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE editor_coding_contest(" +
                    "username varchar(20)," +
                    "contest_id int NOT NULL," +
                    "PRIMARY KEY (username, contest_id)," +
                    "FOREIGN KEY (username) references editor (username)," +
                    "FOREIGN KEY (contest_id ) references coding_contest(contest_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);


            sql = "CREATE TABLE category_coding_challenges(" +
                    "challenge_id int NOT NULL AUTO_INCREMENT," +
                    "category_name varchar(20)," +
                    "PRIMARY KEY (challenge_id)," +
                    "FOREIGN KEY (category_name) references category(category_name)," +
                    "FOREIGN KEY (challenge_id) references coding_challenges(challenge_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE editor_coding_challenges(" +
                    "username VARCHAR(20)," +
                    "challenge_id int NOT NULL AUTO_INCREMENT," +
                    "PRIMARY KEY (challenge_id)," +
                    "FOREIGN KEY (username) references editor(username)," +
                    "FOREIGN KEY (challenge_id) references coding_challenges(challenge_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql = "CREATE TABLE interview_interview_coding_challenges(" +
                    "interview_id int," +
                    "challenge_id int," +
                    "PRIMARY KEY (challenge_id)," +
                    "FOREIGN KEY (interview_id) references interview(interview_id)," +
                    "FOREIGN KEY (challenge_id) references interview_coding_challenges(challenge_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);


            sql =   "CREATE TABLE coding_contest_contest_coding_challenges(" +
                    "contest_id int," +
                    "challenge_id int," +
                    "PRIMARY KEY (contest_id,challenge_id)," +
                    "FOREIGN KEY (contest_id) references coding_contest(contest_id)," +
                    "FOREIGN KEY (challenge_id) references contest_coding_challenges(challenge_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql =   "CREATE TABLE user_submission_survival_challenge"
                    + "(survival_id int,"
                    + "username varchar(20),"
                    + "PRIMARY KEY (survival_id, username),"
                    + "FOREIGN KEY (survival_id) references coding_challenges(challenge_id),"
                    + "FOREIGN KEY (username) references user(username)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            sql =   "CREATE TABLE practice_coding_challenge_survival_challenge"
                    + "(survival_id int,"
                    + "challenge_id int,"
                    + "PRIMARY KEY (survival_id,challenge_id),"
                    + "FOREIGN KEY (survival_id) references survival_coding_challenge(survival_id),"
                    + "FOREIGN KEY (challenge_id) references practice_coding_challenges(challenge_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);


            sql = 	"CREATE TABLE interviewer_interviewee"
                    + "(interview_id int,"
                    + "sub_id int,"
                    + "username VARCHAR(20),"
                    + "FOREIGN KEY (username) REFERENCES user(username),"
                    + "FOREIGN KEY (interview_id) REFERENCES interview(interview_id),"
                    + "FOREIGN KEY (sub_id) REFERENCES submission(sub_id),"

                    + "PRIMARY KEY (interview_id)) ENGINE=innodb";

            mystmt.executeUpdate(sql);

            System.out.println ("Created owns table");

        }catch (Exception exc) {
            exc.printStackTrace();
        }
    }
}
