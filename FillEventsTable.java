/**
 * Created by jaskarnjagpal on 1/30/17.
 */
import java.sql.*;
import java.util.Random;


public class FillEventsTable {
    static final String JDBC_DRIVER="com.mysql.jdbc.Driver";
    static final String DB_URL="jdbc:mysql://teamone";

    static final String USER="teamone_user";
    static final String PASS="teamone_db";

	static final double LAT_MIN = 38.54;
	static final double LAT_MAX = 38.6;
	
	static final double LONG_MIN= -121.55;
	static final double LONG_MAX= -121.4;

    private static int[] eventID= new int[900];

    private static String[] eventName = new String[900];

    private static String[] event_location = {"Sacramento, CA", "New York, New York",
    "San Francisco, CA", "Seattle, WA", "Portland, OR", "Reno, NV", "Las Vegas, NV", "Dallas, TX"};
    private String[] eventTypes={"Music", "Food and Drink","Sports", "Outdoor",
                                "Health and Fitness", "Family and Friends","Retail",
                                "Performing Arts", "Entertainment"};
    private static String[] gender = {"Male", "Female"};


    public static void main(String[] args){
        Connection conn = null;
        Statement stmt = null;
        final String letters = "ABCDEFGHIJKLMNOPQRSTUVWXY";
        fillEventInfo();
        try{

            Class.forName("com.mysql.jdbc.Driver");
            System.out.println("Connection to database...");
            conn=DriverManager.getConnection(DB_URL, USER, PASS);
            System.out.println("Connection Established");
            stmt = conn.createStatement();
            String sql, sql2;
            for(int i=0; i<900; i++) {
                Random rand = new Random();
                int random = rand.nextInt(event_location.length);
                // = "INSERT INTO events(event_id, event_name, event_location, preference_id) " +
                 //     "VALUES ("+i+", '"+eventName[i]+"', '"+event_location[random]+"', "+(rand.nextInt(9)+1)+");";
                sql2 = "INSERT INTO users(user_id, first_name, last_name, user_email, gender) "+
                        "VALUES ("+i+", '"+letters.charAt(rand.nextInt(25))+"', '"+letters.charAt(rand.nextInt(25))+"', 'abc@abc.com',"+gender[rand.nextInt(2)]+");";
                stmt.executeUpdate(sql2);

            }
            System.out.println("Insertion to db complete ");
            conn.close();


        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }catch(SQLException se){
            se.printStackTrace();
        }
    }
	
	private static double getRandLat() {
		Rand rand = new Random();
		return randomValue = LAT_MIN + (LAT_MAX - LAT_MIN) * r.nextDouble();
	}
	
	private static double getRandLong() {
		Rand rand = new Random();
		return randomValue = LONG_MIN + (LONG_MAX - LONG_MIN) * r.nextDouble();
	}
	
    public static void fillEventInfo(){
        Random rand = new Random();
        final String letters = "ABCDEFGHIJKLMNOPQRSTUVWXY";
        for(int i=0; i<900; i++){
            eventID[i] =i;
            eventName[i]=letters.charAt(rand.nextInt(25))+"";

        }
    }
}
