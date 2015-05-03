#!/bin/bash     
sudo iptables -A INPUT -m conntrack --ctstate ESTABLISHED,RELATED -j ACCEPT
sudo iptables -A INPUT -p tcp --dport ssh -j ACCEPT
sudo iptables -A INPUT -p tcp --dport 80 -j ACCEPT
sudo iptables --table filter -P INPUT DROP
sudo iptables --table filter -P FORWARD DROP
sudo iptables --table filter -P OUTPUT ACCEPT
sudo iptables --table filter -N user-input
sudo iptables --table filter -N user-limit
sudo iptables --table filter -N user-limit-accept
sudo iptables --table filter -N user-output
sudo iptables --table filter -A user-input -p tcp -m tcp --dport 25 -j DROP
sudo iptables --table filter -A user-input -p tcp -m tcp --dport 6881 -j DROP
sudo iptables --table filter -A user-input -p udp -m udp --dport 4444 -j DROP
sudo iptables --table filter -A user-input -p tcp -m tcp --dport 2242 -j DROP
sudo iptables --table filter -A user-input -p tcp -m multiport --dports 6881:6891 -j DROP
sudo iptables --table filter -A user-input -p udp -m multiport --dports 6881:6891 -j DROP
sudo iptables --table filter -A user-input -p udp -m udp --dport 4672 -j DROP
sudo iptables --table filter -A user-input -p tcp -m tcp --dport 80 -j ACCEPT
sudo iptables --table filter -A user-input -p udp -m udp --dport 80 -j ACCEPT
sudo iptables --table filter -A user-input -p tcp -m tcp --dport 443 -j ACCEPT
sudo iptables --table filter -A user-input -p udp -m udp --dport 443 -j ACCEPT
sudo iptables --table filter -A user-input -p tcp -m tcp --dport 22 -j DROP
sudo iptables --table filter -A user-input -p tcp -m tcp --dport 25 -j DROP
sudo iptables -I INPUT 5 -m limit --limit 5/min -j LOG --log-prefix "iptables denied: " --log-level 7
sudo iptables -L
sudo iptables-save
sudo sh -c "iptables-save > /etc/iptables.rules"