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
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import model.domain.ModalidadeEdicao;
import model.domain.StatusModalidadeEdicao;

/**
 *
 * @author 55199
 */
public class StatusModalidadeEdicaoDAO {
    
    public java.util.List<StatusModalidadeEdicao> read() {
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        
        java.util.List<StatusModalidadeEdicao> status = new ArrayList<>();
        
        try {
            stmt = con.prepareStatement("SELECT * FROM modalidade_edicao_status");
            rs = stmt.executeQuery();
            
            while(rs.next()){
                
                StatusModalidadeEdicao s = new StatusModalidadeEdicao();
                s.setId(rs.getInt("id"));
                s.setNome(rs.getString("nome"));               
                status.add(s);
                
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(StatusModalidadeEdicaoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }finally{
            ConnectionFactory.closeConnection(con, stmt, rs);
        }
        
        return status;
    }
}
