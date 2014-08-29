package servlet;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;
import java.util.List;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.json.simple.JSONObject;

import socketsample.socket.SocketClient;
import dbconnection.dao.Dao;
import dbconnection.model.User;

/**
 * Servlet implementation class MyServlet
 */


public class MyServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
	private String content;
	private List<User> userList;
	private String mapData;
	private String sonarResponse;
	private String dataResponse;


	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public MyServlet() {
		super();
		content = "";
		mapData = "";
		sonarResponse="";
		dataResponse="";
	}

	
	 @Override
	    public void init() throws ServletException {
	    	super.init();
	    	Dao db = new Dao();
	    	userList=db.getUserList();
	    }
	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		//set the format of the response to json format
		response.setContentType("application/json");
		//Create a Json object
		JSONObject jsonToSend;
		jsonToSend=new JSONObject();
		jsonToSend.put("cmd", "GetInfo");
		jsonToSend.put("data", new Date()+" ----> "+ content);
		jsonToSend.put("map",mapData);
		jsonToSend.put("sonar",sonarResponse);
		jsonToSend.put("info",dataResponse);
		
		//Send the json object to the web browser
		PrintWriter out = response.getWriter();
		out.write(jsonToSend.toString());
		out.flush();
		
		
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	 protected void doPost(HttpServletRequest request,
	            HttpServletResponse response) throws ServletException, IOException {
			SocketClient myClient = new SocketClient("127.0.0.1", 5555);
			// All data transmitted in json format a private List<User> userList;re
			// linked to parameter into the HttpServletRequest
			// get a json attribute cmd
			String cmd = request.getParameter("cmd");
			if (cmd != null) {
				if ("PostInfo".equals(cmd)) {
					// If cmd is available and equal to "PostInfo" then data is
					// retrieve
					String data = request.getParameter("data");
					if (data != null) {
						// Content is updated according to the received data
						content = data;

						// set the format of the response to json format
						response.setContentType("application/json");
						// Create a Json object
						JSONObject jsonToSend;
						jsonToSend = new JSONObject();

						jsonToSend.put("cmd", "PostInfo");
						jsonToSend.put("data", new Date() + " ----> " + content);
						jsonToSend.put("order", content);
						myClient.writeMessage(jsonToSend.toString());

						/*
						 * jsonToSend.put("order","GET_MAP");
						 * myClient.writeMessage(jsonToSend.toString());
						 */

						jsonToSend.put("order", "GET_MAP_STRING");

						String envoi = jsonToSend.toString();

						myClient.writeMessage(envoi);

						for (int i = 0; i < 14; i++) {
							String s = myClient.readMessage();
							System.out.println(s);
							if (i == 0 && "GET_SONAR".equals(content)) {
								sonarResponse = s;
							}
							if (i == 0 && "GET_ALL_INFO_DATA".equals(content)) {
								dataResponse = s;
							}
							if (i == 0 && "GET_MAP".equals(content)) {
								mapData = s;
							}
						}
						// Send the json object to the web browser
						PrintWriter out = response.getWriter();
						out.write(jsonToSend.toString());
						out.flush();
					}

				} else if ("Reset".equals(cmd)) {
					content = "";
				}

			}

			String receivedLogin = request.getParameter("login");
			String receivedpwd = request.getParameter("pwd");
			PrintWriter wr = response.getWriter();
			wr.println("<!DOCTYPE html>");
			wr.println("<html>");
			wr.println("<head>");
			wr.println("<title>PageTitle</title>");
			wr.println("</head>");
			wr.println("<body>");

			boolean isValid = false;

			for (User u : userList) {
				if (u.getLogin().equals(receivedLogin)) {
					if (u.getPwd().equals(receivedpwd)) {
						isValid = true;
						break;
					}
				}
			}
			String content = "";

			if (isValid) {
				RequestDispatcher dispatch = getServletContext()
						.getRequestDispatcher("/admin.html");
				dispatch.forward(request, response);
			} else {
				content = "<h1>Mauvais mot de passe ou login, veuillez reessayer</h1>";
			}

			wr.println(content);
			wr.println("</body></html>");

		
	}

}
