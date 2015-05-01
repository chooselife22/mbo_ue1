<?php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<vxml version=\"2.1\" >";
?>
	<var name="Var_Account_Number" expr=""/>
	<var name="Var_Pin_Number" expr=""/>
   <menu id="mainMenu" dtmf="true">
     <prompt> 
       Welcome to the bank application. Choose one of the following options.<enumerate/>
     </prompt> 
     <choice next="#loginForm">login</choice>
     <choice next="#agentForm">call an agent</choice>
   </menu>
   <form id="loginForm">
     <field name="Account_Number" expr="" type="digits?length=5">
     	<grammar version="1.0" xml:lang="en-US" root="keypress" 
         mode="dtmf">
		    <rule id="keypress" scope = "public">
		      <one-of>
		          <item> 1 </item>
		          <item> 2 </item>
		          <item> 3 </item>
		          <item> 4 </item>
		          <item> 5 </item>
		          <item> 6 </item>
		          <item> 7 </item>
		          <item> 8 </item>
		          <item> 9 </item>
		          <item> 0 </item>
		      </one-of>
		    </rule>
		</grammar>
       <prompt>Please tell me your account number.</prompt>
       <filled>
         <prompt> 
           You account number is <say-as interpret-as="digits"><value expr="Account_Number"/></say-as>.
         </prompt> 
         <assign name="Var_Account_Number" expr="Account_Number"/>
       </filled>
     </field>
     <field name="Pin_Number" expr="" type="digits?length=4">
     	<grammar version="1.0" xml:lang="en-US" root="keypress" 
         mode="dtmf">
		    <rule id="keypress" scope = "public">
		      <one-of>
		          <item> 1 </item>
		          <item> 2 </item>
		          <item> 3 </item>
		          <item> 4 </item>
		          <item> 5 </item>
		          <item> 6 </item>
		          <item> 7 </item>
		          <item> 8 </item>
		          <item> 9 </item>
		          <item> 0 </item>
		      </one-of>
		    </rule>
		</grammar>
       <prompt>Please tell me your pin number</prompt>
       <filled>
         <prompt> 
           You pin number is <say-as interpret-as="digits"><value expr="Pin_Number"/></say-as>.
         </prompt>
         <assign name="Var_Pin_Number" expr="Pin_Number"/>
       </filled> 
     </field>
      <subdialog name="login" src="login.php" namelist="Account_Number Pin_Number">
       		<filled>
	   			<if cond="login.status == 'success'">
	   				<prompt>Your login credentials are correct. You are now logged in.</prompt>
	   				<goto next="#loginMenu"/>
	   			</if>
	   			<prompt>Your login credentials are wrong. fuck you.</prompt>
	   			<goto next="#goodbye"/>
	   		</filled>
       </subdialog>

   </form>
 	<form id="agentForm">
 		<prompt>Please hold the line</prompt>
 		<prompt>All agents are busy, please try again later</prompt>
 		<goto next="#goodbye"/>
 	</form>
    <menu id="loginMenu" dtmf="true">
     <prompt> 
   		Choose one of the following options.<enumerate/>
     </prompt> 
     <choice next="#transferForm">transfer money</choice>
     <choice next="#agentForm">call an agent</choice>
     <choice next="#goodbye">disconnect</choice>
	 </menu>
	 <form id="transferForm">
	 	<subdialog name="transfer" src="transfer.php" namelist="Var_Account_Number Var_Pin_Number">
	 		<filled>
	 			<if cond="transfer.status == 'negative'">
	 				<prompt>You have a negative account. You will be redirected to a call agent.</prompt>
	 				<goto next="#agentForm"/>
	 			</if>
	 			<prompt>Your account is positive.</prompt>
	 			<goto next="#recipientForm"/>
	 		</filled>
	 	</subdialog>
	 </form>
	 <form id="recipientForm">
		 <field name="To_Account_Number" expr="" type="digits?length=5">
	     	<grammar version="1.0" xml:lang="en-US" root="keypress" 
	         mode="dtmf">
			    <rule id="keypress" scope = "public">
			      <one-of>
			          <item> 1 </item>
			          <item> 2 </item>
			          <item> 3 </item>
			          <item> 4 </item>
			          <item> 5 </item>
			          <item> 6 </item>
			          <item> 7 </item>
			          <item> 8 </item>
			          <item> 9 </item>
			          <item> 0 </item>
			      </one-of>
			    </rule>
			</grammar>
	       <prompt>Please tell me the account number of the recipient</prompt>
	       <filled>
	         <prompt> 
	           The account number of the recipient is <say-as interpret-as="digits"><value expr="To_Account_Number"/></say-as>.
	         </prompt>
	         <goto next="#loginMenu"/>
	       </filled> 
		</field>
	</form>
	 <form id="goodbye">
 		<prompt>Your login credentials are wrong. I will hang up now. Goodbye.</prompt>
 		<disconnect/>
 	</form>
 </vxml>
