package dbconnection.dao;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import dbconnection.model.User;

public class Dao {
	private static final String HOST = "db-tp.cpe.fr";
	private static final String PORT = "3306";
	private static final String DBNAME = "binome01";
	private static final String USER_NAME = "binome01";
	private static final String USER_PWD = "binome01";

	public Dao() {
		// Chargement du Driver, puis �tablissement de la connexion
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
		}
	}

	public List<User> getUserList() {
		List<User> userList = new ArrayList<User>();

		Connection cnx;
		try {
			cnx = java.sql.DriverManager.getConnection("jdbc:mysql://" + HOST
					+ ":" + PORT + "/" + DBNAME, USER_NAME, USER_PWD);

			// Cr�ation de la requ�te
			Statement query = cnx.createStatement();
			// Executer puis parcourir les r�sultats
			ResultSet rs = query.executeQuery("SELECT * FROM binome01.users");

			
			//R�cup�ration et affichage des r�sultats
			while (rs.next()) {
				User currentUser=new User(rs.getString("firstname"), rs.getString("lastname"), rs.getInt("age"), rs.getString("preference"), rs.getString("login"),rs.getString("pwd"));
				System.out.println(currentUser.toString());
				userList.add(currentUser);
			}
			
			//Fermeture du flux de communication
			rs.close();
			query.close();
			cnx.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return userList;
	}

}
