package dbconnection.launcher;

import java.util.List;

import dbconnection.dao.Dao;
import dbconnection.model.User;

public class Launcher {
	
	public static void main(String[] args) {
		Dao dao=new Dao();
		List<User> myUserList=dao.getUserList();
		
		System.out.println("Get "+myUserList.size()+" Users from database ...");
	}

}
