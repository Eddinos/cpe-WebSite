package dbconnection.model;

public class User {
	private String firstname;
	private String lastname;
	private String preference;
	private String login;
	private String pwd;
	private int age;
	
	public User(String firstname,String lastname,int age,String preference,String login,String pwd) {
		this.firstname = firstname;
		this.lastname = lastname;
		this.age = age;
		this.preference = preference;
		this.login = login;
		this.pwd = pwd;
	}

	public String toString(){
		return firstname+"  "+lastname+"  "+age+"  "+preference+"  "+login+"  "+pwd;
		
		
	}
	
	public String getfirstname() {
		return firstname;
	}

	public void setfirstname(String firstname) {
		this.firstname = firstname;
	}

	public String getLastname() {
		return lastname;
	}

	public void setLastname(String lastname) {
		this.lastname = lastname;
	}

	public String getPreference() {
		return preference;
	}

	public void setPreference(String preference) {
		this.preference = preference;
	}

	public String getLogin() {
		return login;
	}

	public void setLogin(String login) {
		this.login = login;
	}

	public String getPwd() {
		return pwd;
	}

	public void setPwd(String pwd) {
		this.pwd = pwd;
	}

	public int getAge() {
		return age;
	}

	public void setAge(int age) {
		this.age = age;
	}

}
