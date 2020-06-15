/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

import connection.ConnectionFactory;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.domain.AdminModel;


/**
 *
 * @author lgpc1
 */
public class AdminDAO {
    
    public int userExist(String usuario){
      
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        
        try {
            
            stmt = con.prepareStatement("SELECT DA_id FROM DA_admin WHERE DA_usuario = ?");
            stmt.setString(1, usuario);
            stmt.setMaxRows(1);
            rs = stmt.executeQuery();
            
            if(rs.first()){
                
                return rs.getInt("DA_id");
                
            }
            
        } catch (SQLException ex) {
            
            Logger.getLogger(AdminDAO.class.getName()).log(Level.SEVERE, null, ex);
            
        }finally{
            
            ConnectionFactory.closeConnection(con, stmt, rs);
            
        }
        return 0;
    }
    
    public AdminModel selectAdminData(int id){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        
        try {
            
            stmt = con.prepareStatement("SELECT * FROM DA_admin WHERE DA_id = ?");
            stmt.setInt(1, id);
            stmt.setMaxRows(1);
            rs = stmt.executeQuery();
            
            if(rs.first()){
                
                AdminModel adminData = new AdminModel();
                adminData.setId(id);
                adminData.setUsuario(rs.getString("DA_usuario"));
                adminData.setSenha(rs.getString("DA_senha"));
                
                return adminData;
                
            }
        } catch (SQLException ex) {
            
            Logger.getLogger(AdminDAO.class.getName()).log(Level.SEVERE, null, ex);
            
        }finally{
            
            ConnectionFactory.closeConnection(con, stmt, rs);
            
        }
        
        return null;
    }
}
