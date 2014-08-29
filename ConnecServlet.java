package servlet;

import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class ConnecServlet
 */
public class ConnecServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       private boolean cadenas=false;
    /**
     * @see HttpServlet#HttpServlet()
     */
    public ConnecServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		
		if(cadenas==true)
		{
			RequestDispatcher dispatche = getServletContext().getRequestDispatcher("/Occupe.html");
			dispatche.forward(request, response);
		}else{
			RequestDispatcher dispatch = getServletContext().getRequestDispatcher("/cmd.html");
			dispatch.forward(request, response);
		}
		
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		if(request.getParameter("cle").equals("ferme"))
		{
			cadenas=true;
		}
		if(request.getParameter("cle").equals("ouvert"))
		{
			cadenas=false;
		}
		response.sendRedirect("index.html");
	}

}
